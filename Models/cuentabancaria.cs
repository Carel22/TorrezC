//------------------------------------------------------------------------------
// <auto-generated>
//     Este código se generó a partir de una plantilla.
//
//     Los cambios manuales en este archivo pueden causar un comportamiento inesperado de la aplicación.
//     Los cambios manuales en este archivo se sobrescribirán si se regenera el código.
// </auto-generated>
//------------------------------------------------------------------------------

namespace WPregunta4.Models
{
    using System;
    using System.Collections.Generic;
    
    public partial class cuentabancaria
    {
        public int id_Cuenta { get; set; }
        public string tipocuenta { get; set; }
        public Nullable<decimal> saldo { get; set; }
        public Nullable<int> personaId { get; set; }
    }
}
