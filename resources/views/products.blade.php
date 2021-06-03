@extends('shopify-app::layouts.default')

@section('content')
Products

    <div x-data="{loading: true}"
         x-init="
            axios.get('https://wishlist.test/wishlist')
            .then(function(response){
                $refs.dropdown.innerHTML = response.data
                console.log(response.data)
            })
            .catch(function(error){
                console.log(error)
            })
    ">

        <div x-ref="dropdown">
        </div>

    </div>

@endsection

@section('scripts')
    @parent

    <script type="text/javascript">
        var AppBridge = window['app-bridge'];
        var actions = AppBridge.actions;
        var TitleBar = actions.TitleBar;
        var Button = actions.Button;
        var Redirect = actions.Redirect;
        var titleBarOptions = {
            title: 'Products',
        };
        var myTitleBar = TitleBar.create(app, titleBarOptions);
    </script>
@endsection
