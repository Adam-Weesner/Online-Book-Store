# CPSC 332: Fall 2018 - Online Book Store

Group Members:

  Adam Weesner - aweesner@csu.fullerton.edu
  
  Erik Lipsky - eriklipsky@csu.fullerton.edu

---

Notes:
 
  The website uses "bookstore" as its database. It must already be filled with data. User and password for the database must be "root".
  
  If there's an issue in adding books to your cart, enable:
  
  SET @@global.sql_mode= 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION'; 
  
  in your MYSQL.
