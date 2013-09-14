PaJ
===
PaJ is a "simple" framework for websites ; It allow you to create all kind of websites.

How it works
---
basically you just have to create a directory in 
>/system/modules/<
and add a index.php, then you have to open the router file at 
>data/routeur.json<
The hardest part is to create a link for your module, you just have to create a cell in the main table 
```json
{
		"url":"your-url", // you can write your url as a regex and get the $_GET via the vars parameter
		"module":"module", // the name of your directory
		"type":"multiple", /* you can use simple or multiple, you should use the simple one if you only need one redirection ;
		but, if you need multiple redirect with a variant number of $_GET parameters, you need multiple
		*/
		"vars":"", /* in this case, it is useless, but you have to write the name of the obtained vars via the regex in the
		the url parameter, you neeed to split them with a comma */
		"other":[{"url":"your-url/(\\w+)","vars":"a"}] // add just a cell to this board if you need more url
},
```
Now, your module is done, have a great coding.
### Connected modules
This part is comming soon
### Plugin yourself
This part is comming soon
### Tricky things
This part is comming soon
### Admin
This part is comming soon
### Other things you should know
LATER
