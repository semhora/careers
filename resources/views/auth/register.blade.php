@extends('layout.inicio_semtopo')

@section('content')
<div class="blog">
    <div class="container">
        <div class="col-md-12">
            <div class="blog-grid">
                <img class="img-responsive" src="/images/b1.jpg" alt="" />
                <div class="lone-line">

                    <div class="col-md-12 content-top1">
                        <h3>Conheça nossas vantagens:</h3>  </div>
                    <div class="clearfix"> </div>
                    <div class="row line-row">
                        <div class="hr">&nbsp;</div>
                    </div>
                    <div class="row content-row">
                        <div class="col-12 col-lg-3 col-sm-3">
                            <p><i class="fa fa-desktop fa-5x" ></i></p>
                            <div class="row line-row">
                                <div class="hr">&nbsp;</div>
                            </div>
                            <h2>Variedade</h2>
                            <h5>Encontre sugestões de passeio desde uma <span class="font-semibold">peça teatral, show de rock ou barzinho.</span></h5>
                        </div>
                        <div class="col-12 col-lg-3 col-sm-3">
                            <p><i class="fa fa-pencil fa-5x"></i></p>
                            <div class="row line-row">
                                <div class="hr">&nbsp;</div>
                            </div>
                            <h2 class="font-thin">Personalizado</h2>
                            <h5>Personalize sua página conforme suas <span class="font-semibold">preferências.</span></h5>
                        </div>
                        <div class="col-12 col-lg-3 col-sm-3">
                            <p><i class="fa fa-tags fa-5x" ></i></p>
                            <div class="row line-row">
                                <div class="hr">&nbsp;</div>
                            </div>
                            <h2 class="font-thin">Exclusividade</h2>
                            <h5>Receba <span class="font-semibold">descontos exclusivos </span>para curtir seus locais favoritos.</h5>
                        </div>
                        <div class="col-12 col-lg-3 col-sm-3">
                            <p><i class="fa fa-money fa-5x" ></i></p>
                            <div class="row line-row">
                                <div class="hr">&nbsp;</div>
                            </div>
                            <h2 class="font-thin">Versatilidade</h2>
                            <h5 class="font-thin">Você nos diz <span class="font-semibold">quanto tem</span>, e nós te dizemos onde pode ir.</h5>
                        </div>
                        <div class="row line-row">
                            <div class="hr">&nbsp;</div>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="row line-row">
                        <div class="hr">&nbsp;</div>
                    </div>
                    <div class="clearfix"> </div>
                    <div align="rigth">
                        <div class="with-hover-text" align="center">
                            <h2>Cadastre-se! É grátis.</h2>
                            <h5>Já possui cadastro? <a href="{{url('login')}}">Clique aqui</a> e faça login.</h5></a>
                        </div>
                    </div>
                    <div class="row line-row">
                        <div class="hr">&nbsp;</div>
                    </div>
                    <div class="comment-top">
                        <div class="panel-body">
                            {{ Form::open([
                                'id' => 'form',
                                'method' => 'POST',
                                'class' => 'form-horizontal',
                                'url' => url('register'),
                                'files' => true
                            ]) }}

                            {{ Form::hidden('type', 'user') }}

                            @if (count($errors) > 0)
                                <div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <h4><i class="icon fa fa-ban"></i> Alguns erros ocorreram!</h4>
                                    <ul class="errors-list" style="padding: 15px;">
                                        @foreach ($errors->all() as $error)
                                            <li>{!! $error !!}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Nome completo</label>
                                <div class="col-sm-5">
                                    {{ Form::text('name', (Input::old('name') ? Input::old('name') : ''), [ 'class' => 'form-control', 'placeholder' => 'Nome completo' ]) }}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Sexo</label>
                                <div class="col-lg-5">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="fields[genre]" value="masc" /> Masculino
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="fields[genre]" value="fem" /> Feminino
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">CPF</label>
                                <div class="col-sm-5">
                                    {{ Form::text('fields[cpf]', (Input::old('cpf') ? Input::old('cpf') : ''), [ 'class' => 'form-control', 'placeholder' => 'Digite seu CPF' ]) }}
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Data de nascimento</label>
                                <div class="col-sm-5">
                                    {{ Form::text('fields[birth]', (Input::old('birth') ? Input::old('birth') : ''), [ 'class' => 'form-control', 'placeholder' => 'Digite sua data de nascimento ex.: ' . date('d/m/Y') ]) }}
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Telefone</label>
                                <div class="col-sm-5">
                                    {{ Form::text('fields[phone]', (Input::old('phone') ? Input::old('phone') : ''), [ 'class' => 'form-control', 'placeholder' => 'Digite seu Telefone' ]) }}
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">CEP</label>
                                <div class="col-sm-5">
                                    {{ Form::text('fields[cep]', (Input::old('cep') ? Input::old('cep') : ''), [
                                        'class' => 'form-control',
                                        'placeholder' => 'Digite seu Telefone',
                                        'id' => 'cep',
                                        'maxlength' => 9
                                    ]) }}
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Rua</label>
                                <div class="col-sm-5">
                                    {{ Form::text('fields[address]', (Input::old('address') ? Input::old('address') : ''), [
                                        'class' => 'form-control',
                                        'placeholder' => 'Digite sua rua',
                                        'id' => 'rua',
                                    ]) }}
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Bairro</label>
                                <div class="col-sm-5">
                                    {{ Form::text('fields[bairro]', (Input::old('bairro') ? Input::old('bairro') : ''), [
                                        'class' => 'form-control',
                                        'placeholder' => 'Digite seu Bairro',
                                        'id' => 'bairro'
                                    ]) }}
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Cidade</label>
                                <div class="col-sm-5">
                                    {{ Form::text('fields[city]', (Input::old('city') ? Input::old('city') : ''), [
                                        'class' => 'form-control',
                                        'placeholder' => 'Digite sua cidade',
                                        'id' => 'cidade',
                                    ]) }}
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Estado</label>
                                <div class="col-sm-5">
                                    {{ Form::text('fields[state]', (Input::old('state') ? Input::old('state') : ''), [
                                        'class' => 'form-control',
                                        'placeholder' => 'Digite seu estado',
                                        'id' => 'uf',
                                    ]) }}
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Email</label>
                                <div class="col-sm-5">
                                    {{ Form::email('email', (Input::old('email') ? Input::old('email') : ''), [
                                        'class' => 'form-control',
                                        'placeholder' => 'Digite seu e-mail'
                                    ]) }}
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Senha</label>
                                <div class="col-sm-5">
                                    {{ Form::password('password', [
                                        'class' => 'form-control',
                                        'placeholder' => 'Digite uma senha'
                                    ]) }}
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Confirme sua senha</label>
                                <div class="col-sm-5">
                                    {{ Form::password('confirmPassword', [
                                        'class' => 'form-control',
                                        'placeholder' => 'Repita sua senha'
                                    ]) }}
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Escolha suas preferências:</label>

                                <div class="col-sm-5" align="center">
                                    <div class="panel panel-info">
                                        @foreach(\App\Models\Category::all() as $category)
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="categories[]" value="{{ $category->id }}"> {{ $category->name }}
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Imagem de perfil:</label>
                                <div class="col-sm-5">
                                    <input type="file" class="form-control" name="img" />
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-6 col-sm-offset-3">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="agree" value="agree" /> Aceito receber e-mails de notificação.
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-9 col-sm-offset-3">
                                    <button type="submit" class="btn btn-primary" name="signup" value="Sign up">CADASTRAR</button>
                                </div>
                            </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
