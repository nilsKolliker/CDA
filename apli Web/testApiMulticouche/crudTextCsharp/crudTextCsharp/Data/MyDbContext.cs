using System;
using Microsoft.EntityFrameworkCore;
using Microsoft.EntityFrameworkCore.Metadata;
using crudTextCsharp.Data.Models;

#nullable disable

namespace crudTextCsharp.Data
{
    public partial class MyDbContext : DbContext
    {
        public MyDbContext()
        {
        }

        public MyDbContext(DbContextOptions<MyDbContext> options)
            : base(options)
        {
        }
        public virtual DbSet<Utilisateur> Utilisateurs { get; set; }

        protected override void OnConfiguring(DbContextOptionsBuilder optionsBuilder)
        {
            if (!optionsBuilder.IsConfigured)
            {
                optionsBuilder.UseMySQL("Name=GoDTB");
            }
        }

        protected override void OnModelCreating(ModelBuilder modelBuilder)
        {
            modelBuilder.Entity<Utilisateur>(entity =>
            {
                entity.HasKey(e => e.IdUtilisateur)
                    .HasName("PRIMARY");

                entity.ToTable("utilisateurs");

                entity.HasIndex(e => e.AdresseMail, "adresseMail")
                    .IsUnique();

                entity.Property(e => e.IdUtilisateur)
                    .HasColumnType("int(11)")
                    .HasColumnName("idUtilisateur");

                entity.Property(e => e.AdresseMail)
                    .IsRequired()
                    .HasMaxLength(50)
                    .HasColumnName("adresseMail");

                entity.Property(e => e.MotDePasse)
                    .IsRequired()
                    .HasMaxLength(50)
                    .HasColumnName("motDePasse");

                entity.Property(e => e.Nom)
                    .IsRequired()
                    .HasMaxLength(50)
                    .HasColumnName("nom");

                entity.Property(e => e.Prenom)
                    .IsRequired()
                    .HasMaxLength(50)
                    .HasColumnName("prenom");

                entity.Property(e => e.Role)
                    .HasColumnType("int(11)")
                    .HasColumnName("role")
                    .HasComment("2 Admin 1 User");
            });

            OnModelCreatingPartial(modelBuilder);
        }

        partial void OnModelCreatingPartial(ModelBuilder modelBuilder);
    }
}
