<html>
<body>
    <div>
        <div>
            Login page
        </div>
    </div>
        <form action="{{route('admin.login')}}" method="POST">
            @csrf
            <input type="email" name="email"/>
            <input type="password" name="password"/>
            <button type="submit">Submit</button>
        </form>
    </div>
    </div> 
</body>
</html>