## How to Install

- create .env from .env.example
```
cp .env.example .env
```
- migrate database
```
php artisan migrate --seed
```
- Run server
```
php artisan serve
```

## API Documentation

- POST /auth/login
```
Body Request : 
{
    "email" : "nprohaska@example.org",
    "password" : "password"
}
Body Response :
{
    "code": 200,
    "status": true,
    "message": null,
    "data": {
        "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTY1NDM1Mjc0OSwiZXhwIjoxNjU0MzU2MzQ5LCJuYmYiOjE2NTQzNTI3NDksImp0aSI6IjBiWHpERHFMdUpleGZnOGwiLCJzdWIiOjEsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.K4r8l__ZhlWr_WtyxZDm_Ro9OYkcLAE0dUfBR12Qe0w",
        "token_type": "bearer",
        "expires_in": 3600
    }
}
```
- POST /auth/logout
```
Bearer Token : {{ACCESS_TOKEN}}
Body Response :
{
    "code": 200,
    "status": true,
    "message": "Successfully logged out",
    "data": null
}
```
- POST /auth/refresh
```
Bearer Token : {{ACCESS_TOKEN}}
Body Response :
{
    "code": 200,
    "status": true,
    "message": null,
    "data": {
        "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC9hdXRoXC9yZWZyZXNoIiwiaWF0IjoxNjU0MzUyOTE5LCJleHAiOjE2NTQzNTY1MzksIm5iZiI6MTY1NDM1MjkzOSwianRpIjoia3pPbmVCTUlaT1BmS1cwbSIsInN1YiI6MSwicHJ2IjoiMjNiZDVjODk0OWY2MDBhZGIzOWU3MDFjNDAwODcyZGI3YTU5NzZmNyJ9.ap3ZIBaQ9Qc536Q3uUt2hZBMVVwjY9KMKbrghlz1QYE",
        "token_type": "bearer",
        "expires_in": 3600
    }
}
```
- POST /auth/me
```
Bearer Token : {{ACCESS_TOKEN}}
Body Response :
{
    "code": 200,
    "status": true,
    "message": null,
    "data": {
        "id": 1,
        "name": "Martin Corwin",
        "email": "nprohaska@example.org",
        "email_verified_at": "2022-06-01T10:15:59.000000Z",
        "created_at": "2022-06-01T10:15:59.000000Z",
        "updated_at": "2022-06-01T10:15:59.000000Z"
    }
}
```
- GET /auth
```
Bearer Token : {{ACCESS_TOKEN}}
Body Response :
{
    "code": 200,
    "status": true,
    "message": null,
    "data": [
        {
            "id": 1,
            "name": "Martin Corwin",
            "email": "nprohaska@example.org",
            "email_verified_at": "2022-06-01T10:15:59.000000Z",
            "created_at": "2022-06-01T10:15:59.000000Z",
            "updated_at": "2022-06-01T10:15:59.000000Z"
        },
        {
            "id": 2,
            "name": "Sheridan Ziemann",
            "email": "rocky.nienow@example.org",
            "email_verified_at": "2022-06-01T10:15:59.000000Z",
            "created_at": "2022-06-01T10:15:59.000000Z",
            "updated_at": "2022-06-01T10:15:59.000000Z"
        },
        {
            "id": 3,
            "name": "Dr. Mackenzie Trantow",
            "email": "adrianna93@example.net",
            "email_verified_at": "2022-06-01T10:15:59.000000Z",
            "created_at": "2022-06-01T10:15:59.000000Z",
            "updated_at": "2022-06-01T10:15:59.000000Z"
        },
        {
            "id": 4,
            "name": "Mabelle Turner",
            "email": "schowalter.kade@example.com",
            "email_verified_at": "2022-06-01T10:15:59.000000Z",
            "created_at": "2022-06-01T10:15:59.000000Z",
            "updated_at": "2022-06-01T10:15:59.000000Z"
        },
        {
            "id": 5,
            "name": "Cristian Donnelly DVM",
            "email": "sandy26@example.org",
            "email_verified_at": "2022-06-01T10:15:59.000000Z",
            "created_at": "2022-06-01T10:15:59.000000Z",
            "updated_at": "2022-06-01T10:15:59.000000Z"
        },
        {
            "id": 6,
            "name": "Ms. Ella Jaskolski",
            "email": "eugenia.hettinger@example.com",
            "email_verified_at": "2022-06-01T10:15:59.000000Z",
            "created_at": "2022-06-01T10:15:59.000000Z",
            "updated_at": "2022-06-01T10:15:59.000000Z"
        },
        {
            "id": 7,
            "name": "Mr. Raymundo Gutmann",
            "email": "brekke.delphine@example.org",
            "email_verified_at": "2022-06-01T10:15:59.000000Z",
            "created_at": "2022-06-01T10:15:59.000000Z",
            "updated_at": "2022-06-01T10:15:59.000000Z"
        },
        {
            "id": 8,
            "name": "Dolly Langworth",
            "email": "dickinson.alexanne@example.net",
            "email_verified_at": "2022-06-01T10:15:59.000000Z",
            "created_at": "2022-06-01T10:15:59.000000Z",
            "updated_at": "2022-06-01T10:15:59.000000Z"
        },
        {
            "id": 9,
            "name": "Tina Balistreri",
            "email": "rebecca37@example.com",
            "email_verified_at": "2022-06-01T10:15:59.000000Z",
            "created_at": "2022-06-01T10:15:59.000000Z",
            "updated_at": "2022-06-01T10:15:59.000000Z"
        },
        {
            "id": 10,
            "name": "Prof. Louvenia Lemke MD",
            "email": "jkoss@example.com",
            "email_verified_at": "2022-06-01T10:15:59.000000Z",
            "created_at": "2022-06-01T10:15:59.000000Z",
            "updated_at": "2022-06-01T10:15:59.000000Z"
        },
        {
            "id": 11,
            "name": "Mochamad Rizki",
            "email": "rizkylaleur1988@gmail.com",
            "email_verified_at": null,
            "created_at": "2022-06-01T10:37:40.000000Z",
            "updated_at": "2022-06-01T10:37:40.000000Z"
        },
        {
            "id": 12,
            "name": "Mochamad Rizki",
            "email": "rizkylaleur19828@gmail.com",
            "email_verified_at": null,
            "created_at": "2022-06-01T10:40:12.000000Z",
            "updated_at": "2022-06-01T10:40:12.000000Z"
        }
    ]
}
```
- POST /auth
```
Bearer Token : {{ACCESS_TOKEN}}
Body Request : 
{
    "name" : "Rizki",
    "email" : "rizki@example.org",
    "password" : "password"
}
Body Response :
{
    "code": 200,
    "status": true,
    "message": "User has been created",
    "data": {
        "name": "Rizki",
        "email": "rizki@example.org",
        "updated_at": "2022-06-04T14:32:30.000000Z",
        "created_at": "2022-06-04T14:32:30.000000Z",
        "id": 13
    }
}
```
- GET /customers
```
Bearer Token : {{ACCESS_TOKEN}}
Body Response : 
{
    "code": 200,
    "status": true,
    "message": null,
    "data": {
        "current_page": 1,
        "data": [
            {
                "id": 1,
                "name": "Prof. Triston Witting DDS",
                "email": "kozey.romaine@example.com",
                "address": "8317 Pfeffer Drives Suite 107\nTryciamouth, OR 93917-5586",
                "phone": "+1.724.232.5503",
                "created_at": "2022-06-01T10:16:00.000000Z",
                "updated_at": "2022-06-01T10:16:00.000000Z"
            },
            {
                "id": 2,
                "name": "Tracy Mueller",
                "email": "vergie.rodriguez@example.net",
                "address": "79156 Will Forest\nFadelberg, IN 30290-2782",
                "phone": "+1.641.823.9493",
                "created_at": "2022-06-01T10:16:00.000000Z",
                "updated_at": "2022-06-01T10:16:00.000000Z"
            },
            {
                "id": 3,
                "name": "Daryl Hessel V",
                "email": "gideon80@example.net",
                "address": "7617 Elliot Street\nPort Lestermouth, AL 05634",
                "phone": "970.957.1788",
                "created_at": "2022-06-01T10:16:00.000000Z",
                "updated_at": "2022-06-01T10:16:00.000000Z"
            },
            {
                "id": 4,
                "name": "Dallin Mayert",
                "email": "alda.conn@example.com",
                "address": "10584 Judson Fort\nEast Andres, GA 84756",
                "phone": "+1-707-989-2929",
                "created_at": "2022-06-01T10:16:00.000000Z",
                "updated_at": "2022-06-01T10:16:00.000000Z"
            },
            {
                "id": 5,
                "name": "Brenna Luettgen III",
                "email": "fwolff@example.org",
                "address": "142 Emelie Cape\nNew Rogelio, KY 36980-8923",
                "phone": "+13854603458",
                "created_at": "2022-06-01T10:16:00.000000Z",
                "updated_at": "2022-06-01T10:16:00.000000Z"
            },
            {
                "id": 6,
                "name": "Jermey Watsica",
                "email": "claudie97@example.org",
                "address": "1449 Ollie Skyway Apt. 992\nSouth Sabina, MA 20556",
                "phone": "(404) 477-0362",
                "created_at": "2022-06-01T10:16:00.000000Z",
                "updated_at": "2022-06-01T10:16:00.000000Z"
            },
            {
                "id": 7,
                "name": "Casimir Schiller",
                "email": "choppe@example.com",
                "address": "718 Gleichner Meadows Suite 942\nNew Thereseborough, UT 55078-7267",
                "phone": "1-281-540-7578",
                "created_at": "2022-06-01T10:16:00.000000Z",
                "updated_at": "2022-06-01T10:16:00.000000Z"
            },
            {
                "id": 8,
                "name": "Prof. Vern Zboncak",
                "email": "dan.little@example.com",
                "address": "436 Graciela Camp Suite 304\nStanfordville, MT 54873",
                "phone": "(848) 637-9003",
                "created_at": "2022-06-01T10:16:00.000000Z",
                "updated_at": "2022-06-01T10:16:00.000000Z"
            },
            {
                "id": 9,
                "name": "Rosalia Bruen",
                "email": "paxton98@example.com",
                "address": "976 Bartell Row\nLake Arthur, WA 50686",
                "phone": "+15105411851",
                "created_at": "2022-06-01T10:16:00.000000Z",
                "updated_at": "2022-06-01T10:16:00.000000Z"
            },
            {
                "id": 10,
                "name": "Mr. Jovan Keebler",
                "email": "obaumbach@example.com",
                "address": "2000 Herzog Oval\nHailieberg, AR 89937",
                "phone": "650.738.6485",
                "created_at": "2022-06-01T10:16:00.000000Z",
                "updated_at": "2022-06-01T10:16:00.000000Z"
            },
            {
                "id": 11,
                "name": "Elyse Kunde",
                "email": "hazel.kris@example.net",
                "address": "290 Terrance Forks Apt. 817\nEast Kavonhaven, ND 80355-8793",
                "phone": "+1-919-235-1013",
                "created_at": "2022-06-01T10:16:00.000000Z",
                "updated_at": "2022-06-01T10:16:00.000000Z"
            },
            {
                "id": 12,
                "name": "Cordelia Daniel IV",
                "email": "frenner@example.com",
                "address": "329 Stark Extension\nBradytown, NV 69015-1772",
                "phone": "+1 (442) 934-7556",
                "created_at": "2022-06-01T10:16:00.000000Z",
                "updated_at": "2022-06-01T10:16:00.000000Z"
            },
            {
                "id": 13,
                "name": "Mr. Ole Walker IV",
                "email": "tanya11@example.net",
                "address": "86906 Gisselle Rapids Suite 924\nEast Lavina, NJ 59196-0594",
                "phone": "+1-802-870-3943",
                "created_at": "2022-06-01T10:16:00.000000Z",
                "updated_at": "2022-06-01T10:16:00.000000Z"
            },
            {
                "id": 14,
                "name": "Garnett Brekke",
                "email": "mike.mohr@example.org",
                "address": "1062 Duane Throughway Suite 475\nSouth Chancebury, IN 75877",
                "phone": "+1.718.651.3206",
                "created_at": "2022-06-01T10:16:00.000000Z",
                "updated_at": "2022-06-01T10:16:00.000000Z"
            },
            {
                "id": 15,
                "name": "Prof. Jodie Dickinson IV",
                "email": "montana58@example.net",
                "address": "743 Icie Parks Suite 019\nSouth Queenchester, WI 61109",
                "phone": "+1-952-254-7694",
                "created_at": "2022-06-01T10:16:00.000000Z",
                "updated_at": "2022-06-01T10:16:00.000000Z"
            }
        ],
        "first_page_url": "http://127.0.0.1:8000/api/customers?page=1",
        "from": 1,
        "last_page": 67,
        "last_page_url": "http://127.0.0.1:8000/api/customers?page=67",
        "links": [
            {
                "url": null,
                "label": "&laquo; Previous",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/customers?page=1",
                "label": "1",
                "active": true
            },
            {
                "url": "http://127.0.0.1:8000/api/customers?page=2",
                "label": "2",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/customers?page=3",
                "label": "3",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/customers?page=4",
                "label": "4",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/customers?page=5",
                "label": "5",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/customers?page=6",
                "label": "6",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/customers?page=7",
                "label": "7",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/customers?page=8",
                "label": "8",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/customers?page=9",
                "label": "9",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/customers?page=10",
                "label": "10",
                "active": false
            },
            {
                "url": null,
                "label": "...",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/customers?page=66",
                "label": "66",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/customers?page=67",
                "label": "67",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/customers?page=2",
                "label": "Next &raquo;",
                "active": false
            }
        ],
        "next_page_url": "http://127.0.0.1:8000/api/customers?page=2",
        "path": "http://127.0.0.1:8000/api/customers",
        "per_page": 15,
        "prev_page_url": null,
        "to": 15,
        "total": 1001
    }
}
```
- GET /customers?filter[name]={{FILTER_BY_NAME}}&filter[email]={{FILTER_BY_EMAIL}}&filter[address]={{FILTER_BY_ADDRESS}}&filter[phone]={{FILTER_BY_PHONE}}
```
Bearer Token : {{ACCESS_TOKEN}}
Body Request : 
{
    "code": 200,
    "status": true,
    "message": null,
    "data": {
        "current_page": 1,
        "data": [
            {
                "id": 1001,
                "name": "Mochamad Rizki",
                "email": "rizky@test.com",
                "address": "Jalan Sersan H Hambali No. 27",
                "phone": "08562221674",
                "created_at": "2022-06-04T14:33:59.000000Z",
                "updated_at": "2022-06-04T14:33:59.000000Z"
            }
        ],
        "first_page_url": "http://127.0.0.1:8000/api/customers?filter%5Bname%5D=rizk&page=1",
        "from": 1,
        "last_page": 1,
        "last_page_url": "http://127.0.0.1:8000/api/customers?filter%5Bname%5D=rizk&page=1",
        "links": [
            {
                "url": null,
                "label": "&laquo; Previous",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/customers?filter%5Bname%5D=rizk&page=1",
                "label": "1",
                "active": true
            },
            {
                "url": null,
                "label": "Next &raquo;",
                "active": false
            }
        ],
        "next_page_url": null,
        "path": "http://127.0.0.1:8000/api/customers",
        "per_page": 15,
        "prev_page_url": null,
        "to": 1,
        "total": 1
    }
}
```
- POST /customers
```
Bearer Token : {{ACCESS_TOKEN}}
Body Request : 
{
    "name" : "Mochamad Rizki", 
    "address" : "Jalan Sersan H Hambali No. 27",
    "phone" : "08562221674",
    "email" : "rizky@test.com"
}
Body Response :
{
    "code": 200,
    "status": true,
    "message": "Customer has been created",
    "data": {
        "name": "Mochamad Rizki",
        "email": "rizky@test.com",
        "address": "Jalan Sersan H Hambali No. 27",
        "phone": "08562221674",
        "updated_at": "2022-06-04T14:33:59.000000Z",
        "created_at": "2022-06-04T14:33:59.000000Z",
        "id": 1001
    }
}
```
- GET /customers/[customer_id]
```
Bearer Token : {{ACCESS_TOKEN}}
Body Response : 
{
    "code": 200,
    "status": true,
    "message": "Customer has been retrieved",
    "data": {
        "id": 1,
        "name": "Prof. Triston Witting DDS",
        "email": "kozey.romaine@example.com",
        "address": "8317 Pfeffer Drives Suite 107\nTryciamouth, OR 93917-5586",
        "phone": "+1.724.232.5503",
        "created_at": "2022-06-01T10:16:00.000000Z",
        "updated_at": "2022-06-01T10:16:00.000000Z"
    }
}
```
- PUT|PATCH /customers/[customer_id]
```
Bearer Token : {{ACCESS_TOKEN}}
Body Request : 
{
    "name" : "Mochamad Rizki", 
    "address" : "Jalan Sersan H Hambali No. 27",
    "phone" : "08562221674",
    "email": "rizky@test.com"
}
Body Response : 
{
    "code": 200,
    "status": true,
    "message": "Customer has been updated",
    "data": {
        "id": 1,
        "name": "Mochamad Rizki",
        "email": "rizky@test.com",
        "address": "Jalan Sersan H Hambali No. 27",
        "phone": "08562221674",
        "created_at": "2022-06-01T10:16:00.000000Z",
        "updated_at": "2022-06-04T14:38:17.000000Z"
    }
}
```
- DELETE /customers/[customer_id]
```
Bearer Token : {{ACCESS_TOKEN}}
Body Response : 
{
    "code": 200,
    "status": true,
    "message": "Customer has been deleted",
    "data": {
        "id": 1,
        "name": "Mochamad Rizki",
        "email": "rizky@test.com",
        "address": "Jalan Sersan H Hambali No. 27",
        "phone": "08562221674",
        "created_at": "2022-06-01T10:16:00.000000Z",
        "updated_at": "2022-06-04T14:38:17.000000Z"
    }
}
```
- GET /orders
```
Bearer Token : {{ACCESS_TOKEN}}
Body Response : 
{
    "code": 200,
    "status": true,
    "message": null,
    "data": {
        "current_page": 1,
        "data": [
            {
                "id": 1,
                "order_no": "893-4732-371",
                "order_date": "1998-10-21",
                "customer_id": 742,
                "created_at": "2022-06-01T10:16:05.000000Z",
                "updated_at": "2022-06-01T10:16:05.000000Z"
            },
            {
                "id": 2,
                "order_no": "714-6503-162",
                "order_date": "1981-12-06",
                "customer_id": 692,
                "created_at": "2022-06-01T10:16:05.000000Z",
                "updated_at": "2022-06-01T10:16:05.000000Z"
            },
            {
                "id": 3,
                "order_no": "135-6510-215",
                "order_date": "2018-05-21",
                "customer_id": 753,
                "created_at": "2022-06-01T10:16:05.000000Z",
                "updated_at": "2022-06-01T10:16:05.000000Z"
            },
            {
                "id": 4,
                "order_no": "794-1126-832",
                "order_date": "1985-04-10",
                "customer_id": 867,
                "created_at": "2022-06-01T10:16:05.000000Z",
                "updated_at": "2022-06-01T10:16:05.000000Z"
            },
            {
                "id": 5,
                "order_no": "134-7096-107",
                "order_date": "1976-01-19",
                "customer_id": 730,
                "created_at": "2022-06-01T10:16:05.000000Z",
                "updated_at": "2022-06-01T10:16:05.000000Z"
            },
            {
                "id": 6,
                "order_no": "700-6351-088",
                "order_date": "2003-09-18",
                "customer_id": 436,
                "created_at": "2022-06-01T10:16:05.000000Z",
                "updated_at": "2022-06-01T10:16:05.000000Z"
            },
            {
                "id": 7,
                "order_no": "296-4322-098",
                "order_date": "2014-09-21",
                "customer_id": 815,
                "created_at": "2022-06-01T10:16:05.000000Z",
                "updated_at": "2022-06-01T10:16:05.000000Z"
            },
            {
                "id": 8,
                "order_no": "510-0018-006",
                "order_date": "1983-03-20",
                "customer_id": 865,
                "created_at": "2022-06-01T10:16:05.000000Z",
                "updated_at": "2022-06-01T10:16:05.000000Z"
            },
            {
                "id": 9,
                "order_no": "273-9482-264",
                "order_date": "2010-01-23",
                "customer_id": 941,
                "created_at": "2022-06-01T10:16:05.000000Z",
                "updated_at": "2022-06-01T10:16:05.000000Z"
            },
            {
                "id": 10,
                "order_no": "016-4992-045",
                "order_date": "2009-05-08",
                "customer_id": 859,
                "created_at": "2022-06-01T10:16:05.000000Z",
                "updated_at": "2022-06-01T10:16:05.000000Z"
            },
            {
                "id": 11,
                "order_no": "971-3594-850",
                "order_date": "2000-02-25",
                "customer_id": 501,
                "created_at": "2022-06-01T10:16:05.000000Z",
                "updated_at": "2022-06-01T10:16:05.000000Z"
            },
            {
                "id": 12,
                "order_no": "285-1108-901",
                "order_date": "1975-11-01",
                "customer_id": 388,
                "created_at": "2022-06-01T10:16:05.000000Z",
                "updated_at": "2022-06-01T10:16:05.000000Z"
            },
            {
                "id": 13,
                "order_no": "215-9075-424",
                "order_date": "1985-03-31",
                "customer_id": 760,
                "created_at": "2022-06-01T10:16:05.000000Z",
                "updated_at": "2022-06-01T10:16:05.000000Z"
            },
            {
                "id": 14,
                "order_no": "122-9298-992",
                "order_date": "1991-08-03",
                "customer_id": 337,
                "created_at": "2022-06-01T10:16:05.000000Z",
                "updated_at": "2022-06-01T10:16:05.000000Z"
            },
            {
                "id": 15,
                "order_no": "799-4206-069",
                "order_date": "1991-10-22",
                "customer_id": 533,
                "created_at": "2022-06-01T10:16:05.000000Z",
                "updated_at": "2022-06-01T10:16:05.000000Z"
            }
        ],
        "first_page_url": "http://127.0.0.1:8000/api/orders?page=1",
        "from": 1,
        "last_page": 334,
        "last_page_url": "http://127.0.0.1:8000/api/orders?page=334",
        "links": [
            {
                "url": null,
                "label": "&laquo; Previous",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/orders?page=1",
                "label": "1",
                "active": true
            },
            {
                "url": "http://127.0.0.1:8000/api/orders?page=2",
                "label": "2",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/orders?page=3",
                "label": "3",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/orders?page=4",
                "label": "4",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/orders?page=5",
                "label": "5",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/orders?page=6",
                "label": "6",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/orders?page=7",
                "label": "7",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/orders?page=8",
                "label": "8",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/orders?page=9",
                "label": "9",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/orders?page=10",
                "label": "10",
                "active": false
            },
            {
                "url": null,
                "label": "...",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/orders?page=333",
                "label": "333",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/orders?page=334",
                "label": "334",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/orders?page=2",
                "label": "Next &raquo;",
                "active": false
            }
        ],
        "next_page_url": "http://127.0.0.1:8000/api/orders?page=2",
        "path": "http://127.0.0.1:8000/api/orders",
        "per_page": 15,
        "prev_page_url": null,
        "to": 15,
        "total": 5000
    }
}
```
- GET /orders?filter[order_no]={{FILTER_BY_ORDER_NO}}&filter[order_date]={{FILTER_BY_ORDER_DATE}}&filter[customer_id]={{FILTER_BY_CUSTOMER_ID}}
```
Bearer Token : {{ACCESS_TOKEN}}
Body Response :
{
    "code": 200,
    "status": true,
    "message": null,
    "data": {
        "current_page": 1,
        "data": [
            {
                "id": 1,
                "order_no": "893-4732-371",
                "order_date": "1998-10-21",
                "customer_id": 742,
                "created_at": "2022-06-01T10:16:05.000000Z",
                "updated_at": "2022-06-01T10:16:05.000000Z"
            }
        ],
        "first_page_url": "http://127.0.0.1:8000/api/orders?filter%5Border_no%5D=893-4732-371&page=1",
        "from": 1,
        "last_page": 1,
        "last_page_url": "http://127.0.0.1:8000/api/orders?filter%5Border_no%5D=893-4732-371&page=1",
        "links": [
            {
                "url": null,
                "label": "&laquo; Previous",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/orders?filter%5Border_no%5D=893-4732-371&page=1",
                "label": "1",
                "active": true
            },
            {
                "url": null,
                "label": "Next &raquo;",
                "active": false
            }
        ],
        "next_page_url": null,
        "path": "http://127.0.0.1:8000/api/orders",
        "per_page": 15,
        "prev_page_url": null,
        "to": 1,
        "total": 1
    }
}
```
- POST /orders
```
Bearer Token : {{ACCESS_TOKEN}}
Body Request : 
{
    "order_no" : "TEST001",
    "order_date" : "2022-06-04",
    "customer_id" : 2
}
Body Response : 
{
    "code": 200,
    "status": true,
    "message": "Order has been created",
    "data": {
        "order_no": "TEST001",
        "order_date": "2022-06-04",
        "customer_id": 2,
        "updated_at": "2022-06-04T14:42:04.000000Z",
        "created_at": "2022-06-04T14:42:04.000000Z",
        "id": 5002
    }
}
```
- GET /orders/[order_id]
```
Bearer Token : {{ACCESS_TOKEN}}
Body Response : 
{
    "code": 200,
    "status": true,
    "message": "Order has been retrieved",
    "data": {
        "id": 5002,
        "order_no": "TEST001",
        "order_date": "2022-06-04",
        "customer_id": 2,
        "created_at": "2022-06-04T14:42:04.000000Z",
        "updated_at": "2022-06-04T14:42:04.000000Z"
    }
}
```
- PUT|PATCH /orders/[order_id]
```
Bearer Token : {{ACCESS_TOKEN}}
Body Request : 
{
    "order_no" : "TEST001",
    "order_date" : "2022-06-04",
    "customer_id" : 2
}
Body Response : 
{
    "code": 200,
    "status": true,
    "message": "Order has been updated",
    "data": {
        "id": 5002,
        "order_no": "TEST001",
        "order_date": "2022-06-04",
        "customer_id": 2,
        "created_at": "2022-06-04T14:42:04.000000Z",
        "updated_at": "2022-06-04T14:42:04.000000Z"
    }
}
```
- DELETE /orders/[order_id]
```
Bearer Token : {{ACCESS_TOKEN}}
Body Response : 
{
    "code": 200,
    "status": true,
    "message": "Order has been deleted",
    "data": {
        "id": 5002,
        "order_no": "TEST001",
        "order_date": "2022-06-04",
        "customer_id": 2,
        "created_at": "2022-06-04T14:42:04.000000Z",
        "updated_at": "2022-06-04T14:42:04.000000Z"
    }
}
```