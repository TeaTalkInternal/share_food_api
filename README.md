# share_food_api

ShareFoodApi is backend written in php using mysql backend.   

One can post food photos, description about food along with time/date of expiry.  
      
There are thousands of people out there starving... This API is written with intension, if someone could use this and create an interface where atleast one of thousands can get food.
      
# Steps to setup

- Please host share_food_api in your hosting environment
- Setup your mysql using the SQL_dump.sql file
- Add your credentials in db_connect_host_credentials.php

Here you go. Now start using the following APIs and create beautiful and usefull apps.

## Version: 1.0

### /fetch_profile.php

#### POST
##### Summary

fetch user profile

##### Parameters

| Name | Located in | Description | Required | Schema |
| ---- | ---------- | ----------- | -------- | ---- |
| Body | body |  | Yes | [fetchuserprofilerequest](#fetchuserprofilerequest) |

##### Responses

| Code | Description |
| ---- | ----------- |
| 200 |  |

### /login.php

#### POST
##### Summary

login

##### Parameters

| Name | Located in | Description | Required | Schema |
| ---- | ---------- | ----------- | -------- | ---- |
| Body | body |  | Yes | [loginrequest](#loginrequest) |

##### Responses

| Code | Description |
| ---- | ----------- |
| 200 |  |

### /signup.php

#### POST
##### Summary

signup

##### Parameters

| Name | Located in | Description | Required | Schema |
| ---- | ---------- | ----------- | -------- | ---- |
| Body | body |  | Yes | [signuprequest](#signuprequest) |

##### Responses

| Code | Description |
| ---- | ----------- |
| 200 |  |

### /approve_food_item.php

#### POST
##### Summary

approve food item request

##### Parameters

| Name | Located in | Description | Required | Schema |
| ---- | ---------- | ----------- | -------- | ---- |
| Body | body |  | Yes | [approvefooditemrequestrequest](#approvefooditemrequestrequest) |

##### Responses

| Code | Description |
| ---- | ----------- |
| 200 |  |

### /unbook_food_item.php

#### POST
##### Summary

unbook food item

##### Parameters

| Name | Located in | Description | Required | Schema |
| ---- | ---------- | ----------- | -------- | ---- |
| Body | body |  | Yes | [unbookfooditemrequest](#unbookfooditemrequest) |

##### Responses

| Code | Description |
| ---- | ----------- |
| 200 |  |

### /book_food_item.php

#### POST
##### Summary

book food item

##### Parameters

| Name | Located in | Description | Required | Schema |
| ---- | ---------- | ----------- | -------- | ---- |
| Body | body |  | Yes | [bookfooditemrequest](#bookfooditemrequest) |

##### Responses

| Code | Description |
| ---- | ----------- |
| 200 |  |

### /request_for_booking_food_item.php

#### POST
##### Summary

request for booking food item

##### Parameters

| Name | Located in | Description | Required | Schema |
| ---- | ---------- | ----------- | -------- | ---- |
| Body | body |  | Yes | [requestforbookingfooditemrequest](#requestforbookingfooditemrequest) |

##### Responses

| Code | Description |
| ---- | ----------- |
| 200 |  |

### /reject_food_item.php

#### POST
##### Summary

reject food item request

##### Parameters

| Name | Located in | Description | Required | Schema |
| ---- | ---------- | ----------- | -------- | ---- |
| Body | body |  | Yes | [rejectfooditemrequestrequest](#rejectfooditemrequestrequest) |

##### Responses

| Code | Description |
| ---- | ----------- |
| 200 |  |

### /report_abuse.php

#### POST
##### Summary

report abusing content

##### Parameters

| Name | Located in | Description | Required | Schema |
| ---- | ---------- | ----------- | -------- | ---- |
| Body | body |  | Yes | [reportabusingcontentrequest](#reportabusingcontentrequest) |

##### Responses

| Code | Description |
| ---- | ----------- |
| 200 |  |

### /mark_food_item_taken.php

#### POST
##### Summary

mark food item is taken

##### Parameters

| Name | Located in | Description | Required | Schema |
| ---- | ---------- | ----------- | -------- | ---- |
| Body | body |  | Yes | [markfooditemistakenrequest](#markfooditemistakenrequest) |

##### Responses

| Code | Description |
| ---- | ----------- |
| 200 |  |

### /permanent_delete_food_item.php

#### POST
##### Summary

delete food item permanently

##### Parameters

| Name | Located in | Description | Required | Schema |
| ---- | ---------- | ----------- | -------- | ---- |
| Body | body |  | Yes | [deletefooditempermanentlyrequest](#deletefooditempermanentlyrequest) |

##### Responses

| Code | Description |
| ---- | ----------- |
| 200 |  |

### /check_login_exist.php

#### POST
##### Summary

check login credentials already exist

##### Parameters

| Name | Located in | Description | Required | Schema |
| ---- | ---------- | ----------- | -------- | ---- |
| Body | body |  | Yes | [checklogincredentialsalreadyexistrequest](#checklogincredentialsalreadyexistrequest) |

##### Responses

| Code | Description |
| ---- | ----------- |
| 200 |  |

### /fetch_food_item_details.php

#### POST
##### Summary

fetch food item details

##### Parameters

| Name | Located in | Description | Required | Schema |
| ---- | ---------- | ----------- | -------- | ---- |
| Body | body |  | Yes | [fetchfooditemdetailsrequest](#fetchfooditemdetailsrequest) |

##### Responses

| Code | Description |
| ---- | ----------- |
| 200 |  |

### /fetch_food_items_of_user.php

#### POST
##### Summary

fetch food items of paticular user

##### Parameters

| Name | Located in | Description | Required | Schema |
| ---- | ---------- | ----------- | -------- | ---- |
| Body | body |  | Yes | [fetchfooditemsofpaticularuserrequest](#fetchfooditemsofpaticularuserrequest) |

##### Responses

| Code | Description |
| ---- | ----------- |
| 200 |  |

### /fetch_all_food_items.php

#### GET
##### Summary

fetch all food items

##### Parameters

| Name | Located in | Description | Required | Schema |
| ---- | ---------- | ----------- | -------- | ---- |

##### Responses

| Code | Description |
| ---- | ----------- |
| 200 |  |

### /upload_image.php

#### POST
##### Summary

upload image

##### Parameters

| Name | Located in | Description | Required | Schema |
| ---- | ---------- | ----------- | -------- | ---- |
| file | formData |  | Yes | string |

##### Responses

| Code | Description |
| ---- | ----------- |
| 200 |  |

### /add_food_item.php

#### POST
##### Summary

add food item

##### Parameters

| Name | Located in | Description | Required | Schema |
| ---- | ---------- | ----------- | -------- | ---- |
| Body | body |  | Yes | [addfooditemrequest](#addfooditemrequest) |

##### Responses

| Code | Description |
| ---- | ----------- |
| 200 |  |

### Models

#### fetchuserprofilerequest

| Name | Type | Description | Required |
| ---- | ---- | ----------- | -------- |
| phonenumber | string |  | Yes |

**Example**
<pre>{
  "phonenumber": "7083101608"
}</pre>

#### loginrequest

| Name | Type | Description | Required |
| ---- | ---- | ----------- | -------- |
| username | string |  | Yes |
| email | string |  | Yes |
| phonenumber | string |  | Yes |

**Example**
<pre>{
  "username": "kevin",
  "email": "kevinvishal@gmail.com",
  "phonenumber": "8149002679"
}</pre>

#### signuprequest

| Name | Type | Description | Required |
| ---- | ---- | ----------- | -------- |
| username | string |  | Yes |
| email | string |  | Yes |
| phonenumber | string |  | Yes |

**Example**
<pre>{
  "username": "kevin",
  "email": "kevinvishal@gmail.com",
  "phonenumber": "8149002679"
}</pre>

#### approvefooditemrequestrequest

| Name | Type | Description | Required |
| ---- | ---- | ----------- | -------- |
| uniqueid | string |  | Yes |
| phonenumber | string |  | Yes |

**Example**
<pre>{
  "uniqueid": "1479084051",
  "phonenumber": "8149002679"
}</pre>

#### unbookfooditemrequest

| Name | Type | Description | Required |
| ---- | ---- | ----------- | -------- |
| uniqueid | string |  | Yes |
| phonenumber | string |  | Yes |

**Example**
<pre>{
  "uniqueid": "1479084051",
  "phonenumber": "8149002679"
}</pre>

#### bookfooditemrequest

| Name | Type | Description | Required |
| ---- | ---- | ----------- | -------- |
| uniqueid | string |  | Yes |
| bookie_phonenumber | string |  | Yes |

**Example**
<pre>{
  "uniqueid": "1479084051",
  "bookie_phonenumber": "8149002679"
}</pre>

#### requestforbookingfooditemrequest

| Name | Type | Description | Required |
| ---- | ---- | ----------- | -------- |
| uniqueid | string |  | Yes |
| bookie_phonenumber | string |  | Yes |

**Example**
<pre>{
  "uniqueid": "1479084108",
  "bookie_phonenumber": "8149002679"
}</pre>

#### rejectfooditemrequestrequest

| Name | Type | Description | Required |
| ---- | ---- | ----------- | -------- |
| uniqueid | string |  | Yes |
| phonenumber | string |  | Yes |

**Example**
<pre>{
  "uniqueid": "1479084108",
  "phonenumber": "8149002675"
}</pre>

#### reportabusingcontentrequest

| Name | Type | Description | Required |
| ---- | ---- | ----------- | -------- |
| uniqueid | string |  | Yes |

**Example**
<pre>{
  "uniqueid": "1479084108"
}</pre>

#### markfooditemistakenrequest

| Name | Type | Description | Required |
| ---- | ---- | ----------- | -------- |
| uniqueid | string |  | Yes |

**Example**
<pre>{
  "uniqueid": "1479971240"
}</pre>

#### deletefooditempermanentlyrequest

| Name | Type | Description | Required |
| ---- | ---- | ----------- | -------- |
| uniqueid | string |  | Yes |

**Example**
<pre>{
  "uniqueid": "1479084051"
}</pre>

#### checklogincredentialsalreadyexistrequest

| Name | Type | Description | Required |
| ---- | ---- | ----------- | -------- |
| phonenumber | string |  | Yes |

**Example**
<pre>{
  "phonenumber": "8149002679"
}</pre>

#### fetchfooditemdetailsrequest

| Name | Type | Description | Required |
| ---- | ---- | ----------- | -------- |
| uniqueid | string |  | Yes |

**Example**
<pre>{
  "uniqueid": "1479084051"
}</pre>

#### fetchfooditemsofpaticularuserrequest

| Name | Type | Description | Required |
| ---- | ---- | ----------- | -------- |
| phonenumber | string |  | Yes |

**Example**
<pre>{
  "phonenumber": "8149002679"
}</pre>

#### addfooditemrequest

| Name | Type | Description | Required |
| ---- | ---- | ----------- | -------- |
| name | string |  | Yes |
| itemname | string |  | Yes |
| uniqueid | integer |  | Yes |
| reportedabuse | integer |  | Yes |
| phonenumber | string |  | Yes |
| alternate_phonenumber | string |  | Yes |
| email | string |  | Yes |
| description | string |  | Yes |
| istaken | integer |  | Yes |
| isbooked | integer |  | Yes |
| uploaddate | string |  | Yes |
| address | string |  | Yes |
| lat | double |  | Yes |
| lng | double |  | Yes |
| is_regular | integer |  | Yes |
| mon | integer |  | Yes |
| tue | integer |  | Yes |
| wed | integer |  | Yes |
| thur | integer |  | Yes |
| fri | integer |  | Yes |
| sat | integer |  | Yes |
| sun | integer |  | Yes |
| is_needy | integer |  | Yes |
| serves_count | integer |  | Yes |
| pickat_date | integer |  | Yes |
| pickby_date | integer |  | Yes |
| ispending | integer |  | Yes |
| bookiePhonenumber | string |  | Yes |
| image_name | string |  | Yes |
| food_type | integer |  | Yes |
| expiry_date | integer |  | Yes |

**Example**
<pre>{
  "name": "kevinvishal777",
  "itemname": "Biryani fish",
  "uniqueid": 1479084122,
  "reportedabuse": 0,
  "phonenumber": "8134343256",
  "alternate_phonenumber": "7676543234",
  "email": "mmm@yyy.com",
  "description": "Birayani for all",
  "istaken": 0,
  "isbooked": 0,
  "uploaddate": "",
  "address": "C. A. Siteno. 40, I Phase, J P Nagar, Gaurav Nagar, JP Nagar 7th Phase, JP Nagar, Bengaluru, Karnataka 560078, India",
  "lat": 12.8873185,
  "lng": 77.5780751,
  "is_regular": 0,
  "mon": 0,
  "tue": 0,
  "wed": 0,
  "thur": 0,
  "fri": 0,
  "sat": 0,
  "sun": 0,
  "is_needy": 0,
  "serves_count": 2,
  "pickat_date": 1479127260,
  "pickby_date": 1479129072,
  "ispending": 0,
  "bookiePhonenumber": "8149002674",
  "image_name": "1479084108_file.png",
  "food_type": 1,
  "expiry_date": 0
}</pre>

