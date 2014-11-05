<h2>Sign up using this form</h2>

{{ form('user/register', 'method': 'post') }}
    <label>Name</label>
    {{ text_field("name", "size": 32) }}
    <p>
        <label>Email</label>
        {{ text_field("email", "size": 32) }}
    </p>

    {{ submit_button('Register') }}
</form>

