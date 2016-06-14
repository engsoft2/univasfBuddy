var dinnerElement = document.querySelector('#dinner');
var dinnerElementContainer = dinnerElement.parentNode;
var dinnerSettings = {
  data: dinner,
  columns: [
      {
          data: 'saladaCruaCozida',
          type: 'text',
          width: 150,
          readOnly: isReadOnly
      },
      {
          data: 'pratoPrincipal',
          type: 'text',
          width: 200,
          readOnly: isReadOnly
      },
      {
          data: 'guanicao',
          type: 'text',
          width: 150,
          readOnly: isReadOnly
      },
                      {
          data: 'cereal',
          type: 'text',
          width: 150,
          readOnly: isReadOnly
      },
      {
          data: 'vegetariano',
          type: 'text',
          width: 150,
          readOnly: isReadOnly
      },
      {
          data: 'sopa',
          type: 'text',
          width: 150,
          readOnly: isReadOnly
      },
                      {
          data: 'bebida',
          type: 'text',
          width: 150,
          readOnly: isReadOnly
      }

  ],
  autoWrapRow: true,
  rowHeaders: [
      'Segunda-Feira',
      'Terça-Feira',
      'Quarta-Feira',
      'Quinta-Feira',
      'Sexta-feira'
  ],
  colHeaders: [
      'Salada Crua/Cozida',
      'Prato Principal',
      'Guarnição',
      'Cereal',
      'Vegetariano',
      'Sopa',
      'Bebida'
  ],
  manualRowResize: true,
  manualColumnResize: true
};

var dinner = new Handsontable(dinnerElement, dinnerSettings);
