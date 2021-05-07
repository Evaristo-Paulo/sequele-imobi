<!-- ALTERAR SENHA -->
<div class="col-lg-6 mt-5">
    <div class="card">
        <div class="card-body">
            <!-- Modal -->
            <div class="modal fade" id="user-modal-altera-senha">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Usuários | Actualização de Senha</h5>
                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                        </div>
                        <form action="{{ route('users.change.password') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="email-modal" class="col-form-label">
                                        Email <span class="required">*</span></label>
                                    <input class="form-control" required type="email"
                                        value="{{ old('email') }}" name="email" id="email-modal">
                                </div>
                                <div class="form-group">
                                    <label for="password-modal" class="col-form-label">
                                        Senha <span class="required">*</span></label>
                                    <input class="form-control" minlength="6" value="{{ old('password') }}" required type="password" id="password-modal" name="password">
                                </div>
                                <div class="form-group">
                                    <label for="password-same" class="col-form-label">
                                        Confirma Senha <span class="required">*</span></label>
                                    <input class="form-control" minlength="6" value="{{ old('password-same') }}" required type="password" id="password-same" name="password-same">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Enviar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
