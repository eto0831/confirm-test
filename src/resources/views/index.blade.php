@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="contact-form__content">
    <div class="contact-form__heading">
      <h2>お問い合わせ</h2>
    </div>
    <form class="form" action="/confirm" method="post">
      @csrf
      <div class="form__group">
        <div class="form__group-title">
          <span class="form__label--item">お名前1</span>
          <span class="form__label--required">必須</span>
        </div>
        <div class="form__group-content">
          <div class="form__input--text">
            <input type="text" name="last_name" placeholder="山田" value="{{ old('last_name') }}" />
          </div>
          <div class="form__error">
            @error('last_name')
            {{ $message }}
            @enderror
          </div>
        </div>
      </div>
      <div class="form__group">
        <div class="form__group-title">
          <span class="form__label--item">お名前2</span>
          <span class="form__label--required">必須</span>
        </div>
        <div class="form__group-content">
          <div class="form__input--text">
            <input type="text" name="first_name" placeholder="太郎" value="{{ old('first_name') }}" />
          </div>
          <div class="form__error">
            @error('first_name')
            {{ $message }}
            @enderror
          </div>
        </div>
      </div>
      <div class="form__group">
        <div class="form__group-title">
          <span class="form__label--item">性別</span>
          <span class="form__label--required">必須</span>
        </div>
        <div class="form__group-content">
            <div class="contact-search">
                <div class="search-form__item-radio">
                    <label>
                    性別
                    </label>
                    <label>
                        <input type="radio" name="gender" value="1"> 男性
                    </label>
                    <label>
                        <input type="radio" name="gender" value="2"> 女性
                    </label>
                    <label>
                        <input type="radio" name="gender" value="3"> その他
                    </label>
                </div>
            </div>
          <div class="form__error">
            @error('gender')
            {{ $message }}
            @enderror
          </div>
        </div>
      </div>
      <div class="form__group">
        <div class="form__group-title">
          <span class="form__label--item">メールアドレス</span>
          <span class="form__label--required">必須</span>
        </div>
        <div class="form__group-content">
          <div class="form__input--text">
            <input type="email" name="email" placeholder="test@example.com" value="{{ old('email') }}" />
          </div>
          <div class="form__error">
            @error('email')
              {{ $message }}
            @enderror
          </div>
        </div>
      </div>
      <div class="form__group">
        <div class="form__group-title">
          <span class="form__label--item">電話番号</span>
          <span class="form__label--required">必須</span>
        </div>
        <div class="form__group-content">
          <div class="form__input--text">
            <input type="tel" name="tell" placeholder="09012345678" value="{{ old('tell') }}" />
          </div>
          <div class="form__error">
            @error('tel')
              {{ $message }}
            @enderror
          </div>
        </div>
      </div>
      <div class="form__group">
        <div class="form__group-title">
          <span class="form__label--item">住所</span>
          <span class="form__label--required">必須</span>
        </div>
        <div class="form__group-content">
          <div class="form__input--text">
            <input type="text" name="address" placeholder="東京" value="{{ old('address') }}" />
          </div>
          <div class="form__error">
            @error('address')
            {{ $message }}
            @enderror
          </div>
        </div>
      </div>
      <div class="form__group">
        <div class="form__group-title">
          <span class="form__label--item">建物</span>
          <span class="form__label--required">無くてもOK</span>
        </div>
        <div class="form__group-content">
          <div class="form__input--text">
            <input type="text" name="building" placeholder="ビル301" value="{{ old('building') }}" />
          </div>
          <div class="form__error">
            @error('building')
            {{ $message }}
            @enderror
          </div>
        </div>
      </div>
      <div class="form__group">
        <div class="form__group-title">
          <span class="form__label--item">性別</span>
          <span class="form__label--required">必須</span>
        </div>
        <div class="form__group-content">
            <div class="contact-search">
                <select class="search-form__item-select" name="category_id">
                    <option value="">お問い合わせの種類</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->content }}</option>
                    @endforeach
                </select>
            </div>
          <div class="form__error">
            @error('category_id')
            {{ $message }}
            @enderror
          </div>
        </div>
      </div>
      <div class="form__group">
        <div class="form__group-title">
          <span class="form__label--item">お問い合わせ内容</span>
        </div>
        <div class="form__group-content">
          <div class="form__input--textarea">
            <textarea name="detail" placeholder="資料をいただきたいです">{{ old('detail') }}</textarea>
          </div>
        </div>
      </div>
      <div class="form__button">
        <button class="form__button-submit" type="submit">送信</button>
      </div>
    </form>
  </div>
@endsection
