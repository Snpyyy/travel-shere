<div class="header mb-5 py-2 shadow">
    <div class="container">
        <div class="row justify-content-between">
            <div class="logo col-4">
                <h1 class="fs-1"><a href="/" class="">Travel Shere</a></h1>
            </div>
            <ul class="nav-bar d-flex col-8 justify-content-end my-auto">
                @if (Auth::check())
                <li class="me-3"><a href="/create">旅のしおりを作成する</a></li>
                <li class="me-3"><a href="/user/mypage">マイページ</a></li>
                <li class="">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-jet-dropdown-link href="{{ route('logout') }}" onclick="event.preventDefault();
                                this.closest('form').submit();">
                            {{ __('ログアウト') }}
                        </x-jet-dropdown-link>
                    </form>
                </li>
                @else
                <li class="me-3"><a href="/create">旅のしおりを作成する</a></li>
                <li class="me-3"><a href="/login">ログイン</a></li>
                <li class=""><a href="register">サインアップ</a></li>
                @endif
            </ul>
        </div>
    </div>
</div>
