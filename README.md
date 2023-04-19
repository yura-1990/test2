# Requrement

1. PHP ^8.1
2. PgSQL ^15.0
3. Postman

## API CRUD
1. Create a new database on your pgsql name what you want
2. Create three table (catalogs, categories, products)
3. Add rows to those tables 
  * catalogs(id (BIGINT), title ((BIGINT)) ), 
  * categories(id (BIGINT), catalog_id (BIGINT), title (BIGINT) ), 
  * products(id (BIGINT), category_id (BIGINT), title (BIGINT) )
4. Integrate project with database in `core/Database.php`
5. Go to postman
6. Insert data `http://yourdomain/api/categories/getAll.php`
