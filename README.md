> Web Development: 
Ocky Aditia @ockyaditia,
Heru Setiadi @HerSet, 
Fauzi Makarim,
Ahmad Tohirien

> Database: 

Vendor {
id_vendor (pk),
id_payment_method (fk),
name,
email,
username,
pass,
metadata,
created_date,
updated_date
}

Customer {
id_customer (pk),
name,
email,
pass,
metadata,
created_date,
updated_date
}

Product {
id_product (pk),
id_vendor (fk),
id_comment (fk),
count,
price,
metadata
}

Transaction {
id_transaction (pk),
id_payment_method (fk),
id_vendor (fk),
id_product (fk),
count_product,
total_price,
confirm,
created_date
}

Success Transaction {
id_transaction (pk),
id_payment_method (fk),
id_vendor (fk),
id_product (fk),
count_product,
total_price,
created_date
}

Failed Transaction {
id_transaction (pk),
id_payment_method (fk),
id_vendor (fk),
id_product (fk),
count_product,
total_price,
created_date
}

Rating {
id_rating (pk),
id_customer (fk),
id_vendor (fk),
rate,
review
}

Comments {
id_comment (pk),
id_cutomer (fk),
comment,
created_date,
update_date
}

Favourite {
id_favourite (pk),
id_vendor (fk),
id_customer (fk)
}

> Prototype: 
![Prototype V0.0.1](https://github.com/5thfloor-appsolution/9bako-web/tree/master/Prototype/V0.0.1.jpg?raw=true "Prototype V0.0.1")