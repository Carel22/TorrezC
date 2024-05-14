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
namespace WPregunta4
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }

        private void dataGridView1_CellContentClick(object sender, DataGridViewCellEventArgs e)
        {
           
        }

        private void splitContainer1_Panel1_Paint(object sender, PaintEventArgs e)
        {

        }

        private void Form1_Load(object sender, EventArgs e)
        {
            Refrescar();
        }
        #region HELPER
        private void Refrescar()
        {
            using (BDCarlaEntities db = new BDCarlaEntities())
            {
                var lst = from d in db.persona
                          select d;
                dataGridView1.DataSource = lst.ToList();

            }
        }
        private int? GetId()
        {
            try
            {
                return int.Parse(dataGridView1.Rows[dataGridView1.CurrentRow.Index].Cells[0].Value.ToString());

            }
            catch
            {
                return null;
            }
        }

        #region HELPER
        private void RefrescarC()
        {
            using (BDCarlaEntities db = new BDCarlaEntities())
            {
                var lst = from d in db.cuentabancaria
                          select d;
                dataGridView1.DataSource = lst.ToList();

            }
        }
        private int? Getid_Cuenta()
        {
            try
            {
                return int.Parse(dataGridView1.Rows[dataGridView1.CurrentRow.Index].Cells[0].Value.ToString());

            }
            catch
            {
                return null;
            }
        }
        #region HELPER
        private void RefrescarT()
        {
            using (BDCarlaEntities db = new BDCarlaEntities())
            {
                var lst = from d in db.transaccionbancaria
                          select d;
                dataGridView1.DataSource = lst.ToList();

            }
        }
        private int? Getid_Transaccion()
        {
            try
            {
                return int.Parse(dataGridView1.Rows[dataGridView1.CurrentRow.Index].Cells[0].Value.ToString());

            }
            catch
            {
                return null;
            }
        }
        #endregion

        private void button1_Click(object sender, EventArgs e)
        {
            Presentation.FrmTabla oFrmTabla = new Presentation.FrmTabla();
            oFrmTabla.ShowDialog();

            Refrescar();
        }

        private void button2_Click(object sender, EventArgs e)
        {
            //atgrievw1 guarda filas seleccionadas
            int? id = GetId();
            if (id != null)
            {
                Presentation.FrmTabla ofrmTabla = new Presentation.FrmTabla(id);
                ofrmTabla.ShowDialog();

                Refrescar();
            }
        }

        private void button3_Click(object sender, EventArgs e)
        {
            //atgrievw1 guarda filas seleccionadas
            int? id = GetId();
            if (id != null)
            {
                using (BDCarlaEntities db = new BDCarlaEntities())
                {
                    persona oTabla = db.persona.Find(id);
                    db.persona.Remove(oTabla);

                    db.SaveChanges();
                }
                    Refrescar();
            }
        }

        private void button4_Click(object sender, EventArgs e)
        {
            Presentation.Form1 oFrmTabla = new Presentation.Form1();
            oFrmTabla.ShowDialog();

            RefrescarC();

        }

        private void button7_Click(object sender, EventArgs e)
        {
            Presentation.FrmTabla2 oFrmTabla = new Presentation.FrmTabla2();
            oFrmTabla.ShowDialog();
            RefrescarT();
        }

        private void button5_Click(object sender, EventArgs e)
        {
            //atgrievw1 guarda filas seleccionadas
            int? id_Cuenta = GetId();
            if (id_Cuenta != null)
            {
                //Presentation.Form1 oFrmTabla = new Presentation.Form1(id_Cuenta);
                Presentation.FrmTabla ofrmTabla = new Presentation.FrmTabla(id_Cuenta);
                ofrmTabla.ShowDialog();
                RefrescarC();
            }
        }

        private void button8_Click(object sender, EventArgs e)
        {
            //atgrievw1 guarda filas seleccionadas
            int? id_Transaccion = GetId();
            if (id_Transaccion != null)
            {                       
                Presentation.FrmTabla ofrmTabla = new Presentation.FrmTabla(id_Transaccion);
                ofrmTabla.ShowDialog();
                RefrescarT();
            }
        }

        private void button6_Click(object sender, EventArgs e)
        {
            //atgrievw1 guarda filas seleccionadas
            int? id_Cuenta = GetId();
            if (id_Cuenta != null)
            {
                using (BDCarlaEntities db = new BDCarlaEntities())
                {
                    cuentabancaria oTabla = db.cuentabancaria.Find(id_Cuenta);
                    db.cuentabancaria.Remove(oTabla);

                    db.SaveChanges();
                }
                RefrescarC();
            }
        }

        private void button9_Click(object sender, EventArgs e)
        {
            //atgrievw1 guarda filas seleccionadas
            int? id_Transaccion = GetId();
            if (id_Transaccion != null)
            {
                using (BDCarlaEntities db = new BDCarlaEntities())
                {
                    transaccionbancaria oTabla = db.transaccionbancaria.Find(id_Transaccion);
                    db.transaccionbancaria.Remove(oTabla);

                    db.SaveChanges();
                }
                RefrescarT();
            }
        }
    }
}
