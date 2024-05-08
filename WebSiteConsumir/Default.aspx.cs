using System;
using System.Collections.Generic;
using System.Data;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

public partial class _Default : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
        
        WsBDCarla.WebServiceSoapClient WS = new WsBDCarla.WebServiceSoapClient();
        DataSet ds = WS.WSlistado();
        GridView1.DataSource = ds.Tables[0];
        GridView1.DataBind();
        GridView2.DataSource = ds.Tables[0];
        GridView2.DataBind();
        //DataSet dsa = WS.WSaltasp();
        //GridView1.DataSource = dsa.Tables[0];
        


    }
    //buscar el CI de la persona
    protected void Button4_Click(object sender, EventArgs e)
    {
        WsBDCarla.WebServiceSoapClient WS = new WsBDCarla.WebServiceSoapClient();
        // Obtener el valor actual del TextBox10
        int id_Persona;
        if (int.TryParse(TextBox10.Text, out id_Persona))
        {
            // Llamar al método WSbusca del servicio web para buscar la persona por su ID
            DataSet ds = WS.WSbusca(id_Persona);

            // Enlazar el resultado al GridView
            GridView2.DataSource = ds.Tables[0];
            GridView2.DataBind();
        }
        else
        {
            // Manejar la situación en la que el valor del TextBox10 no es un número válido
            // Por ejemplo, mostrar un mensaje de error al usuario
        }
    }

    //booton de eliminar a una persona
    protected void Button5_Click(object sender, EventArgs e)
    {
        WsBDCarla.WebServiceSoapClient WS = new WsBDCarla.WebServiceSoapClient();
        // Obtener el valor actual del TextBox10
        int id_Persona;
        if (int.TryParse(TextBox10.Text, out id_Persona))
        {
            // Llamar al método WSbusca del servicio web para buscar la persona por su ID
            DataSet ds = WS.WSelimina(id_Persona);

            // Enlazar el resultado al GridView
            GridView1.DataSource = ds.Tables[0];
            GridView1.DataBind();
        }
        else
        {
            // Manejar la situación en la que el valor del TextBox10 no es un número válido
            // Por ejemplo, mostrar un mensaje de error al usuario
        }
    }
    //campo a buscar se introduce el CI e la persona
    protected void Button1_Click(object sender, EventArgs e)
    {

    }



    protected void TextBox10_TextChanged(object sender, EventArgs e)
    {

    }
}