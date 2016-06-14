var lunchElement = document.querySelector('#lunch');
var luchElementContainer = lunchElement.parentNode;
var luchSettings = {
  data: lunch,
  columns: [
      {
          data: 'saladaCrua',
          type: 'text',
          width: 150,
          readOnly: isReadOnly
      },
      {
          data: 'saladaCozida',
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
          data: 'leguminosa',
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
          data: 'sobremesa',
          type: 'text',
          width: 150,
          readOnly: isReadOnly
      },
                      {
          data: 'suco',
          type: 'text',
          width: 100,
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
      'Salada Crua',
      'Salada Cozida',
      'Prato Principal',
      'Guarnição',
      'Cereal',
      'Leguminosa',
      'Vegetariano',
      'Sobremesa',
      'Suco'
  ],
  manualRowResize: true,
  manualColumnResize: true
};

var lunch = new Handsontable(lunchElement, luchSettings);
