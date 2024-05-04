using System;
using System.Collections.Generic;
using System.Data;
using System.Data.SqlClient;
using System.Linq;
using System.Web;
using System.Web.Services;

/// <summary>
/// Descripción breve de WSPregunta3
/// </summary>
[WebService(Namespace = "http://tempuri.org/")]
[WebServiceBinding(ConformsTo = WsiProfiles.BasicProfile1_1)]
// Para permitir que se llame a este servicio web desde un script, usando ASP.NET AJAX, quite la marca de comentario de la línea siguiente. 
// [System.Web.Script.Services.ScriptService]
public class WSPregunta3 : System.Web.Services.WebService
{

    public WSPregunta3()
    {

        //Elimine la marca de comentario de la línea siguiente si utiliza los componentes diseñados 
        //InitializeComponent(); 
    }

    [WebMethod]
    public string HelloWorld()
    {
        return "Bienvenidos a nuetro Banco Junior";
    }


    [WebMethod]
    public void WSaltasp(int id_Persona, string nombre, string apellido, string email, string rol, string ciudad, string username, string password, string edad)
    {
        using (SqlConnection conn = new SqlConnection("Data Source=DESKTOP-BMNBBM4; Initial Catalog=BDCarla; Integrated Security=True;"))
        {
            conn.Open();

            // Habilitar la inserción explícita de identidad
            string queryEnableIdentityInsert = "SET IDENTITY_INSERT Persona ON";
            SqlCommand cmdEnableIdentityInsert = new SqlCommand(queryEnableIdentityInsert, conn);
            cmdEnableIdentityInsert.ExecuteNonQuery();

            // Tu consulta de inserción
            string queryInsert = "INSERT INTO Persona (id_Persona, nombre, apellido, email, rol, ciudad, username, password, edad) VALUES (@id_Persona, @nombre, @apellido, @email, @rol, @ciudad, @username, @password, @edad)";
            SqlCommand cmdInsert = new SqlCommand(queryInsert, conn);

            // Agregar parámetros
            cmdInsert.Parameters.AddWithValue("@id_Persona", id_Persona);
            cmdInsert.Parameters.AddWithValue("@nombre", nombre);
            cmdInsert.Parameters.AddWithValue("@apellido", apellido);
            cmdInsert.Parameters.AddWithValue("@email", email);
            cmdInsert.Parameters.AddWithValue("@rol", rol);
            cmdInsert.Parameters.AddWithValue("@ciudad", ciudad);
            cmdInsert.Parameters.AddWithValue("@username", username);
            cmdInsert.Parameters.AddWithValue("@password", password);
            cmdInsert.Parameters.AddWithValue("@edad", edad);

            // Ejecutar la consulta de inserción
            cmdInsert.ExecuteNonQuery();

            // Deshabilitar la inserción explícita de identidad
            string queryDisableIdentityInsert = "SET IDENTITY_INSERT Persona OFF";
            SqlCommand cmdDisableIdentityInsert = new SqlCommand(queryDisableIdentityInsert, conn);
            cmdDisableIdentityInsert.ExecuteNonQuery();
        }

    }

    [WebMethod]
    public void WScambiarp(int id_Persona, string nombre, string apellido, string email, string rol, string ciudad, string username, string password, string edad)
    {
        using (SqlConnection conn = new SqlConnection("Data Source=DESKTOP-BMNBBM4; Initial Catalog=BDCarla; Integrated Security=True;"))
        {
            string query = "UPDATE Persona SET nombre = @nombre, apellido = @apellido, email = @email, rol = @rol, ciudad = @ciudad, username = @username, password = @password, edad = @edad WHERE id_Persona = @id_Persona";
            SqlCommand cmd = new SqlCommand(query, conn);

            // Agregando parámetros
            cmd.Parameters.AddWithValue("@id_Persona", id_Persona);
            cmd.Parameters.AddWithValue("@nombre", nombre);
            cmd.Parameters.AddWithValue("@apellido", apellido);
            cmd.Parameters.AddWithValue("@email", email);
            cmd.Parameters.AddWithValue("@rol", rol);
            cmd.Parameters.AddWithValue("@ciudad", ciudad);
            cmd.Parameters.AddWithValue("@username", username);
            cmd.Parameters.AddWithValue("@password", password);
            cmd.Parameters.AddWithValue("@edad", edad);

            conn.Open();
            cmd.ExecuteNonQuery();
        }
    }

    [WebMethod]
    public void WSbajasp(int id_Persona)
    {
        using (SqlConnection conn = new SqlConnection("Data Source=DESKTOP-BMNBBM4; Initial Catalog=BDCarla; Integrated Security=True;"))
        {
            string query = "DELETE FROM Persona WHERE id_Persona = @id_Persona";
            SqlCommand cmd = new SqlCommand(query, conn);

            // Agregando parámetros
            cmd.Parameters.AddWithValue("@id_Persona", id_Persona);

            conn.Open();
            cmd.ExecuteNonQuery();
        }
    }


    [WebMethod]
    public DataSet WSbuscarcuenta(int id_Persona)
    {
        SqlConnection conn = new SqlConnection();
        conn.ConnectionString = "Data Source=DESKTOP-BMNBBM4; Initial Catalog=BDCarla; Integrated Security=True;";
        SqlDataAdapter da = new SqlDataAdapter("SELECT p.nombre,p.apellido,p.email,cb.id_Cuenta AS id_Cuenta,cb.tipocuenta, cb.saldo FROM Persona p INNER JOIN CuentaBancaria cb ON p.id_Persona = cb.personaID  WHERE p.id_Persona='"+ id_Persona + "'", conn);
        DataSet ds = new DataSet();
        da.Fill(ds);
        return ds;
    }

    [WebMethod]
    public DataSet WSlistado()
    {
        SqlConnection conn = new SqlConnection();
        conn.ConnectionString = "Data Source=DESKTOP-BMNBBM4; Initial Catalog=BDCarla; Integrated Security=True;";
        SqlDataAdapter da = new SqlDataAdapter("SELECT * FROM persona", conn);
        DataSet ds = new DataSet();
        da.Fill(ds);
        return ds;
    }



    [WebMethod]
    public void WSaltasc(int id_Cuenta, string tipoCuenta, decimal saldo, int personaID)
    {
        using (SqlConnection conn = new SqlConnection("Data Source=DESKTOP-BMNBBM4; Initial Catalog=BDCarla; Integrated Security=True;"))
        {
            string queryEnable = "SET IDENTITY_INSERT cuentabancaria ON;";
            SqlCommand cmdEnable = new SqlCommand(queryEnable, conn);

            conn.Open();
            cmdEnable.ExecuteNonQuery();

            string query = "INSERT INTO cuentabancaria (id_Cuenta, tipocuenta, saldo, personaID) VALUES (@id_Cuenta, @tipoCuenta, @saldo, @personaID)";
            SqlCommand cmd = new SqlCommand(query, conn);

            // Agregando parámetros
            cmd.Parameters.AddWithValue("@id_Cuenta", id_Cuenta);
            cmd.Parameters.AddWithValue("@tipoCuenta", tipoCuenta);
            cmd.Parameters.AddWithValue("@saldo", saldo);
            cmd.Parameters.AddWithValue("@personaID", personaID);

            cmd.ExecuteNonQuery();

            string queryDisable = "SET IDENTITY_INSERT cuentabancaria OFF;";
            SqlCommand cmdDisable = new SqlCommand(queryDisable, conn);
            cmdDisable.ExecuteNonQuery();
        }
    }

    [WebMethod]
    public void WScambiarc(int id_Cuenta, string tipoCuenta, decimal saldo, int personaID)
    {
        using (SqlConnection conn = new SqlConnection("Data Source=DESKTOP-BMNBBM4; Initial Catalog=BDCarla; Integrated Security=True;"))
        {
            string query = "UPDATE cuentabancaria SET tipocuenta = @tipoCuenta, saldo = @saldo, personaID = @personaID WHERE id_Cuenta = @id_Cuenta";
            SqlCommand cmd = new SqlCommand(query, conn);

            // Agregando parámetros
            cmd.Parameters.AddWithValue("@id_Cuenta", id_Cuenta);
            cmd.Parameters.AddWithValue("@tipoCuenta", tipoCuenta);
            cmd.Parameters.AddWithValue("@saldo", saldo);
            cmd.Parameters.AddWithValue("@personaID", personaID);

            conn.Open();
            cmd.ExecuteNonQuery();
        }
    }

    [WebMethod]
    public void WSbajasc(int id_Cuenta)
    {
        using (SqlConnection conn = new SqlConnection("Data Source=DESKTOP-BMNBBM4; Initial Catalog=BDCarla; Integrated Security=True;"))
        {
            string query = "DELETE FROM cuentabancaria WHERE id_Cuenta = @id_Cuenta";
            SqlCommand cmd = new SqlCommand(query, conn);

            // Agregando parámetros
            cmd.Parameters.AddWithValue("@id_Cuenta", id_Cuenta);

            conn.Open();
            cmd.ExecuteNonQuery();
        }
    }



    [WebMethod]
    public void WSaltast(int id_Transaccion, int cuentaID, string tipoTransaccion, decimal monto, DateTime fechaHora)
    {
        using (SqlConnection conn = new SqlConnection("Data Source=DESKTOP-BMNBBM4; Initial Catalog=BDCarla; Integrated Security=True;"))
        {
            string query = "INSERT INTO transaccionbancaria (cuentaID, tipoTransaccion, monto, fechaHora) VALUES (@cuentaID, @tipoTransaccion, @monto, @fechaHora)";
            SqlCommand cmd = new SqlCommand(query, conn);

            // Agregando parámetros
            cmd.Parameters.AddWithValue("@cuentaID", cuentaID);
            cmd.Parameters.AddWithValue("@tipoTransaccion", tipoTransaccion);
            cmd.Parameters.AddWithValue("@monto", monto);
            cmd.Parameters.AddWithValue("@fechaHora", fechaHora);

            conn.Open();
            cmd.ExecuteNonQuery();
        }
    }

    [WebMethod]
    public void WScambiart(int cuentaID, string tipoTransaccion, decimal monto, DateTime fechaHora)
    {
        using (SqlConnection conn = new SqlConnection("Data Source=DESKTOP-BMNBBM4; Initial Catalog=BDCarla; Integrated Security=True;"))
        {
            string query = "UPDATE transaccionbancaria SET cuentaID = @cuentaID, tipoTransaccion = @tipoTransaccion, monto = @monto, fechaHora = @fechaHora WHERE id_Transaccion = @id_Transaccion";
            SqlCommand cmd = new SqlCommand(query, conn);

            // Agregando parámetros
            cmd.Parameters.AddWithValue("@cuentaID", cuentaID);
            cmd.Parameters.AddWithValue("@tipoTransaccion", tipoTransaccion);
            cmd.Parameters.AddWithValue("@monto", monto);
            cmd.Parameters.AddWithValue("@fechaHora", fechaHora);

            conn.Open();
            cmd.ExecuteNonQuery();
        }
    }

    [WebMethod]
    public void WSbajast(int id_Transaccion)
    {
        using (SqlConnection conn = new SqlConnection("Data Source=DESKTOP-BMNBBM4; Initial Catalog=BDCarla; Integrated Security=True;"))
        {
            string query = "DELETE FROM transaccionbancaria WHERE id_Transaccion = @id_Transaccion";
            SqlCommand cmd = new SqlCommand(query, conn);

            // Agregando parámetros
            cmd.Parameters.AddWithValue("@id_Transaccion", id_Transaccion);

            conn.Open();
            cmd.ExecuteNonQuery();
        }
    }

    
}
