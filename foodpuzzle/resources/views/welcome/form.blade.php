<div class="col-12 pt-5">
    <form id="search-form" method="POST" action="/search">
        @csrf
        <div class="input-group">
            <input
                    class="form-control"
                    id="search"
                    name="query"
                    placeholder="{{$placeHolder}}"
            />
            <div class="input-group-append">
                <span class="input-group-text">
                    <button type="submit" class="btn">
                        <i class="fas fa-search"></i>
                    </button>
                </span>
            </div>
        </div>
    </form>
</div>