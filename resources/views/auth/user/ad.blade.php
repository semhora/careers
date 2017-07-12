@extends('layout.inicio_semtopo')

@section('content')

<!--content-->
<div class="blog">
	<div class="container">
		<div class="col-md-9">
			<div class="blog-grid">
				<img class="img-responsive" src="/images/b4.png" alt="" />
				<div class="row line-row">
					<div class="hr">&nbsp;</div>
				</div>
				<div class="lone-line">
					<h4	>Anunciante, conheça nossas vantagens</h4>
					<div class="row line-row">
						<div class="hr">&nbsp;</div>
		  			</div>
					<div class="row content-row">
						<div class="row line-row">
							<div class="hr">&nbsp;</div>
						</div>
						<div class="col-12 col-lg-3 col-sm-6">
							<p><i class="fa fa-unlock fa-5x"></i></p>
							<h2 class="font-thin">Grátis</h2>
							<h5 class="font-thin">Cadastro grátis, <span class="font-semibold">sem limite</span> de eventos cadastrados.</h5>
						</div>
						<div class="col-12 col-lg-3 col-sm-6">
							<p><i class="fa fa-line-chart fa-5x"></i></p>
							<h2 class="font-thin">Acompanhe</h2>
							<h5 class="font-thin">Acompanhe o desempenho do seu evento por meio de gráficos e relatórios.</h5>
						</div>
						<div class="col-12 col-lg-3 col-sm-6">
							<p><i class="fa fa-comment fa-5x"></i></p>
							<h2 class="font-thin">Feedback</h2>
							<h5 class="font-thin">Receba <span class="font-semibold">comentários e recomendações </span> dos usuários sobre seu evento.</h5>
						</div>
						<div class="col-12 col-lg-3 col-sm-6">
							<p><i class="fa fa-search fa-5x"></i></p>
							<h2 class="font-thin">Visibilidade</h2>
							<h5 class="font-thin">Seja visto. Seja notado. Seja encontrado.</h5>
						</div>
					</div>
					<div class="row line-row">
						<div class="hr">&nbsp;</div>
					</div>
					<div align="rigth">
						<div class="row line-row">
							<div class="hr">&nbsp;</div>
						</div>
						<div class="with-hover-text" align="center">
							<div class="row line-row">
								<div class="hr">&nbsp;</div>
							</div>

							<h3>Cadastre-se! É grátis.</h3>

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

                            {{ Form::open([
                                'class' => 'form-horizontal',
                                'id' => 'defaultForm',
                                'method' => 'POST',
                                'url' => url('register'),
                                'files' => true
                            ]) }}
                            {{ Form::hidden('type', 'ad') }}

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Nome da Empresa</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="name" placeholder="Nome Fantasia" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Razão Social</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="fields[razao]" placeholder="Razão Social" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">CNPJ</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="fields[CNPJ]" placeholder="CNPJ da empresa"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">CEP</label>
                                <div class="col-sm-5">
                                    <input type="text"  id="cep" class="form-control"  maxlength="9" name="fields[cep]" placeholder="CEP"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Rua</label>
                                <div class="col-sm-5">
                                    <input name="fields[address]" type="text" class="form-control" size="65" id="rua" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Bairro</label>
                                <div class="col-sm-5">
                                    <input name="fields[bairro]" type="text" class="form-control" size="65" id="bairro"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Cidade</label>
                                <div class="col-sm-5">
                                    <input type="text" id="cidade" name="fields[city]" class="form-control" size="65"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Estado</label>
                                <div class="col-sm-5">
                                    <input type="text" id="uf" class="form-control" size="65" name="fields[state]"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Telefone</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="fields[telefone]" placeholder="telefone"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Email</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="email" placeholder="email"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Senha</label>
                                <div class="col-sm-5">
                                    <input type="password" class="form-control" name="password" placeholder="senha"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Confirme sua senha</label>
                                <div class="col-sm-5">
                                    <input type="password" class="form-control" name="confirmPassword" placeholder="confirme a senha" />
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
                                            <input type="checkbox" name="agree" value="agree" /> Aceito os termos de uso.
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

			<div class="col-md-3">
				<div class="grid-categories" data-spy="affix" >
					<div class="cate-top" data-spy="affix" >
						<h4>LOGIN</h4>
						<div class="cate-cate">
							<div class="head-blog">
								<h6><i class="glyphicon glyphicon-chevron-right"> </i>Já possui cadastro? Entre.</h6>
								{{ Form::open([
								 	'class' => 'form-horizontal',
								 	'id' => 'affixDefaultForm',
								 	'method' => 'POST',
								 	'url' => url('login')
								]) }}

									<div class="form-group">
										<label class="col-sm-3 control-label">Email</label>
										<div class="col-sm-12">
											<input type="text" class="form-control" name="email" placeholder="email"/>
										</div>
									</div>

									<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
										<label for="password" class="col-md-4 control-label">Senha</label>
										<div class="col-md-12">
											<input id="password" type="password" class="form-control" name="password">
											@if ($errors->has('password'))
												<span class="help-block">
														<strong>{{ $errors->first('password') }}</strong>
												</span>
											@endif
										</div>
									</div>
									<button type="submit" class="btn btn-primary">
										Entrar
									</button>
									<label>
										<input type="checkbox" name="remember"> Lembrar
									</label>
									<a class="btn btn-link" href="{{ url('password/reset') }}">
										Esqueceu sua senha?
									</a>
								{{ Form::close() }}
							</div>
						</div>
					</div>
				</div>
			</div>
		<div class="clearfix"> </div>
	</div>
</div>

<!--//content-->
@endsection
