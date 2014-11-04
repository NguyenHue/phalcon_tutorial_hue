
    <h2>List Member</h2>
    <table border="1" style="width:100%">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Type</th>
        </tr>
        {% for item in page.items %}
            <tr>
                <td>{{ item.id }}</td>
                <td>{{ item.name }}</td>
                <td>{{ item.email }}</td>
            </tr>
        {% endfor %}
    </table>
    {% if page.total_pages > 1 %}
        <a href="/user/index?page=1">First</a>
        <a href="/user/index?page={{page.before}}">Previous</a>
        <a href="/user/index?page={{page.next}}">Next</a>
        <a href="/user/index?page={{page.last}}">Last</a>
        <p>You are in page {{page.current}} of {{ page.total_pages }}</p>
    {% endif %}
