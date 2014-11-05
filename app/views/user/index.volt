
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
        {{ link_to('user/index?page=1', 'First') }}
        {{ link_to('user/index?page=' ~ page.before, 'Previous') }}
        {{ link_to('user/index?page=' ~ page.next, 'Next') }}
        {{ link_to('user/index?page=' ~ page.last, 'Last') }}
        <p>You are in page {{page.current}} of {{ page.total_pages }}</p>
    {% endif %}
