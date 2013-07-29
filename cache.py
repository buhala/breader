import mysql.connector;
connection=mysql.connector.connect(user='root',password='123456',database='breader');
cursor=connection.cursor();
cursor.execute('TRUNCATE TABLE cache');