@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('content')
<div class="contact__content">

    {{-- タイトルと検索エリア --}}
    <div class="contact__heading">
        <h2>Admin</h2>
    </div>
    <form class="search-form" action="/admin/search" method="get">
        @csrf
        <div class="contact-search">
            <input type="text" class="search-form__item-input" placeholder="名前やメールアドレスを入力してください" name="keyword" value="{{ old('keyword') }}">
        </div>
        <div class="contact-search">
            <select class="search-form__item-select" name="gender">
                <option value="">性別</option>
                <option value="1">男性</option>
                <option value="2">女性</option>
                <option value="3">その他</option>
            </select>
        </div>
        <div class="contact-search">
            <select class="search-form__item-select" name="category_id">
                <option value="">お問い合わせの種類</option>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->content }}</option>
                @endforeach
            </select>
        </div>
        <div class="contact-search">
            <input type="date" class="search-form__item-input" name="created_at">
        </div>
        <div class="search-form__button">
            <button class="search-form__button-submit" type="submit">検索</button>
        </div>
        <div class="search-form__reset-button">
            <a class="search-form__button" href="/admin">リセット</a>
        </div>
    </form>

    {{-- エクスポートボタンとページネーション --}}
    <div class="contact-parts">
        <form class="export__button" action="/csv-download" method="get">
            @csrf
            @foreach (request()->query() as $key => $value)
                <input type="hidden" name="{{ $key }}" value="{{ $value }}">
            @endforeach
            <button class="export__button-submit" type="submit">エクスポート</button>
        </form>
        <div class="contact__link">
            {{ $contacts->links() }}
        </div>
    </div>

    {{-- テーブル --}}
    <div class="contact-table">
        <table class="contact-table__inner">
            <table-header>
                <tr class="contact-table__row">
                    <th class="contact-table__header"><span>お名前</span></th>
                    <th class="contact-table__header"><span>性別</span></th>
                    <th class="contact-table__header"><span>メールアドレス</span></th>
                    <th class="contact-table__header"><span>お問い合わせの種類</span></th>
                    <th class="contact-table__header"></th>
                </tr>
            </table-header>
            <table-body>
                @foreach ($contacts as $contact)
                <tr class="contact-table__row">
                    <td class="contact-table__item"><span>{{ $contact['last_name'] }} {{ $contact['first_name'] }}</span></td>
                    <td class="contact-table__item"><span>{{ $contact->gender }}</span></td>
                    <td class="contact-table__item"><span>{{ $contact['email'] }}</span></td>
                    <td class="contact-table__item"><span>{{ $contact->category->content }}</span></td>
                    <td class="contact-table__item">
                        <button class="contact-table__detail-button">詳細</button>
                    </td>
                </tr>
                @endforeach
            </table-body>
        </table>
    </div>
</div>
@endsection