
# Dynamic Dependency DropDown Using jQuery AJAX

This is Dynamic Dependency DropDown using jQuery AJAX. I take three table named 'Country', 'State', 'City'.
Using Dependency Injuction 'State' field will depend on 'Country' table field. Respectively 'City'
field will depend on 'State' field.


## Installation

Installing this project first download the project and run this command on terminal

```bash
  php artisan serve
```
    
## File management

- There is a controller named "DynamicDependencyController". All methods are given there.
```bash
  path : App/Http/Controllers/DynamicDependencyController.php
```

- There is three model named "Country", "State", "City".
```bash
  path :  App/Models/Country.php
          App/Models/State.php
          App/Models/City.php
```

- There is a file named "index.blade.php". All frontend code are given there.
```bash
  path :  resources/views/dynamicDependencies/index.blade.php.
```

## jQuery Ajax Dependency Injection for - "State" and "City" depend on "Country"

```javascript
<script>

  jQuery(document).ready(function(){
      // for auto select state
      jQuery('#country').change(function(event){
          var country_id = jQuery(this).val();
          // console.log(country_id);

          jQuery('#state').html('');

          $.ajax({
              url         : 'show-state',
              type        : 'POST',
              dataType    : 'json',
              data        : {
                  country_id : country_id, //1st 'country_id' is database field name and 2nd 'country_id' is var name
                  _token     : '{{ csrf_token() }}'
              },
              success     : function(response){
                  jQuery('#state').html('<option value="">----------Select State----------</option>');
                  jQuery.each(response.state, function(index, state){
                      jQuery('#state').append('<option value="'+state.id+'">'+state.name+'</option>');
                  });
              },
          });
      });

      // for auto select city
      jQuery('#state').change(function(event){
          var state_id = jQuery(this).val();
          // console.log(country_id);

          jQuery('#city').html('');

          $.ajax({
              url         : 'show-city',
              type        : 'POST',
              dataType    : 'json',
              data        : {
                  state_id : state_id,
                  _token     : '{{ csrf_token() }}'
              },
              success     : function(response){
                  console.log(response);
                  jQuery('#city').html('<option value="">----------Select City----------</option>');
                  jQuery.each(response.city, function(index, city){
                      jQuery('#city').append('<option value="'+city.id+'">'+city.name+'</option>');
                  });
              },
          });
      });
  });

</script>
```

# Frontend code for dropdown fields "Country", "State" and "City"
```javascript
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Dynamic Dependency DropDown</title>
  </head>
  <body>

    <div class="col-md-4 offset-md-4 mt-5">
    <h4 class="mt-3">Dynamic Dependency DropDown</h4>
    <hr>
        {{-- Country  --}}
        <div class="form-group">
            <label for="country">Country</label>
            <select name="country" id="country" class="form-control">
                <option value="#">----------Select Country----------</option>
                @foreach($countries as $country)
                <option value="{{ $country->id }}">{{ $country->name }}</option>
                @endforeach
            </select>
        </div>

        {{-- State  --}}
        <div class="form-group">
            <label for="state">State</label>
            <select name="state" id="state" class="form-control">
                <option value="">------------Select State------------</option>
            </select>
        </div>

        {{-- City  --}}
        <div class="form-group">
            <label for="city">City</label>
            <select name="city" id="city" class="form-control">
                <option value="">------------Select City------------</option>
            </select>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    {{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
</body>
</html>
```
## Screenshots

![App Screenshot](https://via.placeholder.com/468x300?text=App+Screenshot+Here)

