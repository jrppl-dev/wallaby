<?php

/**
 * @apiDefine EventSuccessMultipleResponse
 * @apiSuccessExample {json} Success-Response:
 * HTTP/1.1 200 OK
 * {
 *   "data": [
 *     {
 *        "object": "Event",
 *        "id": "NxOpZowo9GmjKqdR",
 *        "name": "Brannon Turner",
 *        "city": "Rettert",
 *        "country": "Germany",
 *        "start_date": "2021-12-11",
 *        "end_date": "2022-01-17"
 *     },
 *     {
 *        "object": "Event",
 *        "id": "XbPW7awNkzl83LD6",
 *        "name": "Mia Bogisich",
 *        "city": "Berettyoujfalu",
 *        "country": "Hungary",
 *        "start_date": "2021-10-11",
 *        "end_date": "2021-12-05"
 *     },
 *     {
 *        "object": "Event",
 *        "id": "aYOxlpzRMwrX3gD7",
 *        "name": "Dr. Orie Douglas Jr.",
 *        "city": "Gaukonigshofen",
 *        "country": "Germany",
 *        "start_date": "2021-10-24",
 *        "end_date": "2021-11-17"
 *     },
 *     {
 *        "object": "Event",
 *        "id": "39n0Z12OZGKERJgW",
 *        "name": "Pink Shanahan",
 *        "city": "Frenes",
 *        "country": "France",
 *        "start_date": "2021-10-20",
 *        "end_date": "2021-12-18"
 *     },
 *     {
 *        "object": "Event",
 *        "id": "O9apoVGyLz5qNX4K",
 *        "name": "Afton Cruickshank",
 *        "city": "Tangendorf",
 *        "country": "Germany",
 *        "start_date": "2021-11-30",
 *        "end_date": "2022-01-16"
 *     }
 * ],
 * "meta": {
 *   "include": [
 *      "roles"
 *   ],
 *   "custom": [],
 *   "pagination": {
 *     "total": 6500,
 *     "count": 5,
 *     "per_page": 5,
 *     "current_page": 1,
 *     "total_pages": 1300,
 *     "links": {
 *       "next": "http://api.wallaby.localhost/v1/events?orderBy=id&sortedBy=asc&limit=5&page=2"
 *     }
 *   }
 *  }
 * }
 */

