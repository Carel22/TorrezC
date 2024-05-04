using System;
using System.Collections.Generic;
using System.Data.SqlClient;
using System.Linq;
using System.Web;
using System.Web.Services;

/// <summary>
/// Descripción breve de WebService
/// </summary>
[WebService(Namespace = "http://tempuri.org/")]
[WebServiceBinding(ConformsTo = WsiProfiles.BasicProfile1_1)]
// Para permitir que se llame a este servicio web desde un script, usando ASP.NET AJAX, quite la marca de comentario de la línea siguiente. 
// [System.Web.Script.Services.ScriptService]
public class WebService : System.Web.Services.WebService
{

    public WebService()
    {

        //Elimine la marca de comentario de la línea siguiente si utiliza los componentes diseñados 
        //InitializeComponent(); 
    }

    [WebMethod]
    public string HelloWorld()
    {
        return "Hola a todos";
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


}

