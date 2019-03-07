
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<script>
    function Refresh() {
        document.querySelector(".captcha-image").src = '/captcha';
    } 
</script>

<div class="col-12 pt-5">
    <form id="recipe-form" class="row" method="POST" action="/registerr">
        <div class="col-12 col-md-12">
            @csrf
            <div class="form-group">
                <div class="input-group">
                    <input class="form-control" type="email" name="email" placeholder="Email Address" required/>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <input class="form-control" type="text" name="name" placeholder="Username" required/>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <input class="form-control" type="password" name="password" placeholder="Password" required/>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <input class="form-control" type="password" name="c_password" placeholder="Confirm Password" required/>
                </div>
            </div>

            <p>
                <img src="/captcha" width="120" height="30" border="1" alt="CAPTCHA" class="captcha-image">
                <i class="fa" onclick="Refresh()">&#xf021;</i>
                <br>
                <input class="form-control" type="text" name="captcha" pattern="[0-9]{5}" placeholder="type the digits from the image into this box" required/>
                <br>
            </p>

        </div>
        <button type="submit" class="btn btn-success btn-lg btn-block">Sign up</button>
    </form>
</div>
