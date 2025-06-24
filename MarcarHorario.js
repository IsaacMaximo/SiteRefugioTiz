const { createClient } = require('@supabase/supabase-js');

const supabase = createClient(
  process.env.SUPABASE_URL,
  process.env.SUPABASE_ANON_KEY
);

exports.handler = async function (event, context) {
  return {
    statusCode: 200,
    body: JSON.stringify({ mensagem: "Função está funcionando!" }),
  };
};


exports.handler = async (event) => {
  if (event.httpMethod !== 'POST') {
    return {
      statusCode: 405,
      body: JSON.stringify({ error: 'Método não permitido' }),
    };
  }

  try {
    const data = JSON.parse(event.body);

    const { nome, email, data: dataMarcada, hora, servico } = data;

    // Evita marcações duplicadas (mesmo dia/hora)
    const { data: conflito } = await supabase
      .from('marcacoes')
      .select('*')
      .eq('data', dataMarcada)
      .eq('hora', hora);

    if (conflito && conflito.length > 0) {
      return {
        statusCode: 409,
        body: JSON.stringify({ error: 'Já existe uma marcação nesse horário.' }),
      };
    }

    const { error } = await supabase
      .from('marcacoes')
      .insert([{ nome, email, data: dataMarcada, hora, servico }]);

    if (error) throw error;

    return {
      statusCode: 200,
      body: JSON.stringify({ sucesso: true }),
    };
  } catch (err) {
    return {
      statusCode: 500,
      body: JSON.stringify({ error: err.message }),
    };
  }
};