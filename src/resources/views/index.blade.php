@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="contact-form__content">
  <div class="contact-form__heading">
    <h2>Contact</h2>
  </div>
  <form class="form" action="/confirm" method="post">
    @csrf
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">お名前</span>
        <span class="form__label--required">※</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--text-name">
          <input type="text" name="last_name" placeholder="山田" value="{{ old('last_name') }}" />
          <input type="text" name="first_name" placeholder="太郎" value="{{ old('first_name') }}" />
        </div>
        <div class="form__error">
          @error('last_name')
          <span>{{ $message }}</span>
          @enderror
          @error('first_name')
          <span>{{ $message }}</span>
          @enderror
        </div>
      </div>
    </div>
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">性別</span>
        <span class="form__label--required">※</span>
      </div>
      <div class="form__group-content">
        <div class="form__radio-wrapper">
          <div class="form__radio-item">
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
        <span class="form__label--required">※</span>
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
        <span class="form__label--required">※</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--text-tell">
          <input type="tel" name="tell_1" placeholder="090" value="{{ old('tell_1') }}" /> -
          <input type="tel" name="tell_2" placeholder="1234" value="{{ old('tell_2') }}" /> -
          <input type="tel" name="tell_3" placeholder="5678" value="{{ old('tell_3') }}" />
        </div>
        <div class="form__error">
          @error('tell_1')
          <span>{{ $message }}</span>
          @enderror
          @error('tell_2')
          <span>{{ $message }}</span>
          @enderror
          @error('tell_3')
          <span>{{ $message }}</span>
          @enderror
        </div>
      </div>
    </div>
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">住所</span>
        <span class="form__label--required">※</span>
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
        <span class="form__label--required"></span>
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
        <span class="form__label--item">お問い合わせの種類</span>
        <span class="form__label--required">※</span>
      </div>
      <div class="form__group-content">
        <div class="select__item-wrapper">
          <select class="select__item-select" name="category_id">
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
        <span class="form__label--required">※</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--textarea">
          <textarea name="detail" placeholder="資料をいただきたいです">{{ old('detail') }}</textarea>
        </div>
      </div>
    </div>
    <div class="form__button">
      <button class="form__button-submit" type="submit">確認画面</button>
    </div>
  </form>
</div>
@endsection