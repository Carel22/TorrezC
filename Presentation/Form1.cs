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
    public partial class Form1 : Form
    {
        public int? id_Cuenta;
        cuentabancaria oTabla = null;
        public Form1(int? id_Cuenta = null)
        {
            InitializeComponent();
            this.id_Cuenta = id_Cuenta;
            if (id_Cuenta != null)

                CargaDatos();
        }
        private void CargaDatos()
        {
            using (BDCarlaEntities db = new BDCarlaEntities())
            {
                oTabla = db.cuentabancaria.Find(id_Cuenta);

                //textC.Text = oTabla.id_Persona ;
                textT.Text = oTabla.tipocuenta;
                //textSaldo.Text = oTabla.saldo.ToString(textSaldo);
                oTabla.saldo = decimal.Parse(textSaldo.Text);
                //textCI.Text = oTabla.personaId;


            }
        }
        private void textC_TextChanged(object sender, EventArgs e)
        {

        }

        private void button1_Click(object sender, EventArgs e)
        {
            using (BDCarlaEntities db = new BDCarlaEntities())
            {
                if (id_Cuenta == null)
                    oTabla = new cuentabancaria();

                //oTabla.id_Persona = textC.Text;
                oTabla.tipocuenta = textT.Text;
                oTabla.saldo = decimal.Parse(textSaldo.Text);
               /// oTabla.personaId = textCI.Text;

                if (id_Cuenta == null)
                    db.cuentabancaria.Add(oTabla);
                else
                {
                    db.Entry(oTabla).State = System.Data.Entity.EntityState.Modified;
                }
                //db.persona.Add(oTabla);
                db.SaveChanges();

                this.Close();
            }
        }

        private void Form1_Load(object sender, EventArgs e)
        {

        }
    }
}
