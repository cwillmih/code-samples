
# My thoughts on the PHP Standards Recommendations

While I have generally coded to what is now known as the PSR for most of my career, there are a few things that I tend to ignore due to personal preference.

## PSR-2

### Code MUST use 4 spaces for indenting, not tabs.

I configure my code editor to set tab size to four spaces.  I used to configure all tabs to be converted to four spaces, but I found myself not liking how code lined up when I would comment.  (I tend to comment code at the first column, not where the line of code is indented to.)

```php
/**
 *  Four spaces instead of tabs.
 */
function some_function() {
    while(true) {
        do_something();
//        do_something_else();
    }
}
```

```php
/**
 *  Tabs instead of four spaces.
 */
function some_function() {
	while(true) {
		do_something();
//		do_something_else();
	}
}
```

### Opening braces for classes MUST go on the next line, and closing braces MUST go on the next line after the body.

Maybe it's my age showing, but I, along with several of my friends and colleagues who have been coding as long as I have, do not like the look, feel, and balance of opening braces being on its own line for classes, methods, or functions.  Not to mention, this kind of contradicts the **opening braces for control structures MUST go on the same line** recommendation.

```php
/**
 *  Opening brace on its own line.
 */
function some_function()
{	// Eww.
	while(true)
	{	// Eww, again.
		do_something();
	}
}
```

```php
/**
 *  Opening brace where it feels better..
 */
function some_function() {	// Ahh... that's how I like it.
	while(true) {
		do_something();
	}
}
```

### Control structure keywords MUST have one space after them; method and function calls MUST NOT.

I believe the space recommendation after a control structure keyword, should be the same as a method and function; No space should be between the control structure keyword and an opening parenthesis.  While I understand the reasoning behind it, anything that can and does use parenthesis, should be thought of as a quasi-function, since it does take a form of arguments.

```php
/**
 *  One space after control structure keyword.
 */
function some_function() {
	while (true) {	// Eww.
		do_something();
	}
}
```

```php
/**
 *  No space after control structure keyword.
 */
function some_function() {
	while(true) {	// Just like that.
		do_something();
	}
}
```
