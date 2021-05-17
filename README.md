# php-post-test

## Test
```sh
$ sudo docker-compose up --build -d
$ curl -XPOST --data "sample=hello" --data "email=<script>console.log(\"hello\")</script>" http://localhost:8080/post_receiver.php
$ less ./log/${tested at formatted YYYYMMDD}.log
# {"data":{"sample":"hello","email":"&lt;script&gt;console.log(\\&quot;hello\\&quot;)&lt;\/script&gt;"}}
# 
$ curl -XPOST --data "sample=hello" --data "email=<script>console.log(\"hello\")</sc>" http://localhost:8080/post_receiver.php
$ less ./log/${tested at formatted YYYYMMDD}.log
# {"data":{"sample":"hello","email":"&lt;script&gt;console.log(\\&quot;hello\\&quot;)&lt;\/script&gt;"}}
# {"data":{"sample":"hello","email":"&lt;script&gt;console.log(\\&quot;hello\\&quot;)&lt;\/sc&gt;"}}
# 
```
