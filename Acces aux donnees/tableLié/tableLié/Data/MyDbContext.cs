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
            modelBuilder.Entity<Departement>(e2 =>
            {
                e2.ToTable("departement");
                e2.Property(e => e.IdDepartement).HasColumnName("IdDepartement");
            });
            modelBuilder.Entity<Ville>(e1 =>
            {
                e1.ToTable("ville");
                e1.Property(e => e.IdDepartement).HasColumnName("IdDepartement");
                e1.HasOne(e => e.Departement).WithOne().HasForeignKey<Ville>(e => e.IdDepartement);
            });
        }
    }
}
