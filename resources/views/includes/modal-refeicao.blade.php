<div class="modal fade" tabindex="-1" role="dialog" id="edit-modal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Refeição</h4>
        </div>
        <div class="modal-body">
            <form>
                <div class="form-group">
                  <label for="sel1">Selecione o dia</label>
                  <select class="form-control" id="dia">
                    <option>Segunda-Feira</option>
                    <option>Terça-Feira</option>
                    <option>Quarta-Feira</option>
                    <option>Quinta-Feira</option>
                    <option>Sexta-Feira</option>
                  </select>
                </div>
                <div class="form-group">
                    <label for="acompanhamento">Acompanhamento</label>
                    <input type="text" name="acompanhamento" class="form-control" id="acompanhamento">       
                </div>
                <div class="form-group">
                    <label for="prato-principal">Prato Principal</label>
                    <input type="text" name="prato-principal" class="form-control" id="prato-principal">       
                </div>
                <div class="form-group">
                    <label for="complemento">Complemento</label>
                    <input type="text" name="complemento" class="form-control" id="complemento">       
                </div>
                <div class="form-group">
                    <label for="salada">Salada</label>
                    <input type="text" name="salada" class="form-control" id="salada">       
                </div>
                <div class="form-group">
                    <label for="sobremesa">Sobremesa</label>
                    <input type="text" name="sobremesa" class="form-control" id="sobremesa">       
                </div>

            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
          <button type="button" class="btn btn-primary" id="modal-save-refeicao">Incluir</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal --> 

  <div class="modal fade" tabindex="-1" role="dialog" id="save-modal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Salvar Cardápio</h4>
        </div>
        <div class="modal-body">
            <form>
                <div class="form-group">
                    <label for="acompanhamento">Data</label>
                    <input type="text" name="acompanhamento" class="form-control">       
                </div>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
          <button type="button" class="btn btn-primary">Finalizar</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal --> 