using Microsoft.EntityFrameworkCore;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using tableLié.Data.Models;

namespace tableLié.Data
{
    public class MyDbContext : DbContext
    {
        public DbSet<Departement> Departement { get; set; }
        public DbSet<Ville> Ville { get; set; }
        public MyDbContext(DbContextOptions<MyDbContext> options) : base(options)
        {
        }

        protected override void OnModelCreating(ModelBuilder modelBuilder)
        {
            modelBuilder.Entity<Entite2>(e2 =>
            {
                e2.ToTable("Entite2");
                e2.Property(e => e.IdEntite2).HasColumnName("IdEntite2");
            });
            modelBuilder.Entity<Entite1>(e1 =>
            {
                e1.ToTable("Entite1");
                e1.Property(e => e.IdEntite2).HasColumnName("IdEntite2");
                e1.HasOne(e => e.Ent2).WithOne().HasForeignKey<Entite2>(e => e.IdEntite2);
            });
        }
    }
}
