﻿//------------------------------------------------------------------------------
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
    using System.Data.Entity;
    using System.Data.Entity.Infrastructure;
    
    public partial class BDCarlaEntities : DbContext
    {
        public BDCarlaEntities()
            : base("name=BDCarlaEntities")
        {
        }
    
        protected override void OnModelCreating(DbModelBuilder modelBuilder)
        {
            throw new UnintentionalCodeFirstException();
        }
    
        public virtual DbSet<cuentabancaria> cuentabancaria { get; set; }
        public virtual DbSet<persona> persona { get; set; }
        public virtual DbSet<transaccionbancaria> transaccionbancaria { get; set; }
    }
}
