```
docker-compose up -d
docker-compose exec php a2enmod rewrite
docker-compose exec php service apache2 restart
docker-compose restart
http://localhost:8080/zf-sample/public/Memo/index
```