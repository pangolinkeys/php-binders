# php-binders
A php repository to simplify combining arrays.

----
## Usage
Add *Bindable* as a trait on the target classes.
```php
use Bindable;
```
Implement the *getKeys()* method so the bind method knows how the array is keyed.
```php
public function getKeys()
{        
    return array_keys($this->data);
} 
```
Create a get method suffixed by the name of the target attribute which is passed a singular key from the *getKeys()* method and returns a reference to the desired position in the array.
```php
public function &getAge($person)
{
    return $this->data[ $person ]['Age'];
}
```    
Finally, call bind and pass through the second object and the key which the bind should occur on.
```php
$people->bind($preference, 'Age');
``` 
These methods should be implemented appropriately in both classes.
## Example
A working example of this can be found in the */example* directory.