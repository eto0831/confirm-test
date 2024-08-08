@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('content')
<div class="contact__content">
    <div class="contact__heading">
        <h2>admin</h2>
    </div>
    <div class="contact-parts">
        <div class="export__button">
            <button class="export__button-submit">エクスポート</button>
        </div>
        <div class="contact__link">
            {{ $contacts->links() }}
        </div>
    </div>
    <div class="contact-table">
        <table class="contact-table_inner">
            <tr class="contact-table__row">
                <th class="contact-table__header">
                    <span class="contact-table__header-span">お名前</span>
                    <span class="contact-table__header-span">性別</span>
                    <span class="contact-table__header-span">メールアドレス</span>
                    <span class="contact-table__header-span">お問い合わせの種類</span>
                </th>
            </tr>
            @foreach ($contacts as $contact)
            <tr class="contact-table__row">
                <td class="contact-table__item">
                    <span class="contact-table__item-span">{{ $contact['last_name'] }} {{ $contact['first_name'] }}</span>
                    <span class="contact-table__item-span">{{ $contact->gender }}</span>
                    <span class="contact-table__item-span">{{ $contact['email'] }}</span>
                    <span class="contact-table__item-span">{{ $contact->category->content }}</span>
                    <span class="contact-table__item-span"><button class="contact-table__detail-button">詳細</button></span>
                </td>
            </tr>
            @endforeach
        </table>

    </div>
</div>
@endsection