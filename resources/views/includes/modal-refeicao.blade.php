<div class="modal fade" tabindex="-1" role="dialog" id="save-modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Salvar Cardápio</h4>
      </div>
      <div class="modal-body">
          <form id="dataForm" class="form-horizontal">
              <div class="form-group">
                <label class="col-xs-3 control-label">Data de Início</label>
                <div class="col-xs-7">
                    <div class="input-group" class="datetimepicker">
                        <input type="text" class="form-control" name="dataInicio" id='dataInicio'/>
                        <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                    </div>
                </div>
              </div>

              <div class="form-group">
                <label class="col-xs-3 control-label">Data de Término</label>
                <div class="col-xs-7">
                    <div class="input-group" class="datetimepicker">
                        <input type="text" class="form-control" name="dataFim" id='dataFim'/>
                        <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                    </div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-xs-5 col-xs-offset-3"> 
                  <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                  <button type="submit" class="btn btn-primary" id="save-cardapio">Salvar</button>
                </div>
              </div>
          </form>
      </div>
      <div class="modal-footer">
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal --> 