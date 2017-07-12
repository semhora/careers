@extends('layout.inicio_semtopo')

@section('content')
<div class="blog">
    <div class="container">
        <div class="col-md-12">
            <div class="blog-grid">
                <div align="rigth">
                    <div class="row line-row">
                        <div class="hr">&nbsp;</div>
                    </div>
                    <div class="with-hover-text" align="center">
                        <div class="row line-row">
                            <div class="hr">&nbsp;</div>
                        </div>
                        <h2>Faça seu login.</h2>
                        <h5>Não possui cadastro? <a href="{{url('register')}}">Clique aqui</a> e faça agora. É gratis!</h5></a>
                    </div>
                </div>
                <div class="row line-row">
                    <div class="hr">&nbsp;</div>
                </div>
                <div class="comment-top">
                    <div class="panel-body">
                        {{ Form::open([
                            'id' => 'FormLogin',
                            'url' => url('login'),
                            'class' => 'form-horizontal',
                            'method' => 'POST'
                        ]) }}
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Email</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="email" placeholder="email"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label">Senha</label>
                                <div class="col-sm-5">
                                    <input type="password" class="form-control" name="password" placeholder="senha"/>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-sm-9 col-sm-offset-4">
                                    <button type="submit" class="btn btn-primary" name="signup" value="Sign up">ENTRAR</button>
                                    <a href="{{ url('/password/reset') }}" class="btn btn-link">Esqueci minha senha</a>
                                </div>
                            </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
