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
    }

    
}