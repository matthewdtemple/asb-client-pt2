<!DOCTYPE html>


<html>

<h1>Create Client</h1>
<h2>Client Information</h2>

<form method="post" action="/createclient">
{{ csrf_field() }}

<label for="firstname">Name:</label>
<input type="text" name="firstname" placeholder="First Name" required/>
<br>

<label for="lastname">Last Name:</label>
<input type="text" name="lastname" placeholder="Last Name" required/>
<br>

<label for="email">Email:</label>
<input type="text" name="email" placeholder="Email" />
<br>
<label for="gender">Gender:</label>
<input type="text" name="gender" placeholder="Gender" required/>
<br>
<button type="submit">Create</button>
</form>

<html>