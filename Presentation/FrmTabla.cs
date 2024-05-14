using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using WPregunta4.Models;

namespace WPregunta4.Presentation
{
    public partial class FrmTabla : Form
    {
        public int? id;
        persona oTabla = null;
        public FrmTabla(int? id=null)
        {
            InitializeComponent();
            this.id = id;
            if (id != null)
            
                CargaDatos();
            
        }
        private void CargaDatos()
        {
            using (BDCarlaEntities db = new BDCarlaEntities())
            {
                oTabla = db.persona.Find(id);

               //textC.Text = oTabla.id_Persona ;
               textNombre.Text = oTabla.nombre;
               textApellido.Text = oTabla.apellido;
               textEmail.Text = oTabla.email;
               textRol.Text = oTabla.rol;


            }
        }
        private void button1_Click(object sender, EventArgs e)
        {
            using (BDCarlaEntities db = new BDCarlaEntities())
            {
                if(id==null)
                    oTabla = new persona();

                //oTabla.id_Persona = textC.Text;
                oTabla.nombre = textNombre.Text;
                oTabla.apellido = textApellido.Text;
                oTabla.email = textEmail.Text;
                oTabla.rol = textRol.Text;

                if (id == null)
                    db.persona.Add(oTabla);
                else
                {
                    db.Entry(oTabla).State=System.Data.Entity.EntityState.Modified;
                }
                //db.persona.Add(oTabla);
                db.SaveChanges();

                this.Close();
            }
        }

        private void FrmTabla_Load(object sender, EventArgs e)
        {

        }

        private void textC_TextChanged(object sender, EventArgs e)
        {

        }

        private void textApellido_TextChanged(object sender, EventArgs e)
        {

        }

        private void textNombre_TextChanged(object sender, EventArgs e)
        {

        }
    }
}
