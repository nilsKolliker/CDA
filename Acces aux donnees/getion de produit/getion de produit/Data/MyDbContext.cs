using System;
using Microsoft.EntityFrameworkCore;
using Microsoft.EntityFrameworkCore.Metadata;
using getion_de_produit.Data.Models;

#nullable disable

namespace getion_de_produit.Data
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

        public virtual DbSet<Categorie> Categories { get; set; }
        public virtual DbSet<Produit> Produits { get; set; }
        public virtual DbSet<Rayon> Rayons { get; set; }

        protected override void OnConfiguring(DbContextOptionsBuilder optionsBuilder)
        {
            if (!optionsBuilder.IsConfigured)
            {
                optionsBuilder.UseMySQL("server=localhost;user=root;database=magasin;ssl mode=none");
            }
        }

        protected override void OnModelCreating(ModelBuilder modelBuilder)
        {
            modelBuilder.Entity<Categorie>(entity =>
            {
                entity.HasKey(e => e.IdCategorie)
                    .HasName("PRIMARY");

                entity.ToTable("categories");

                entity.Property(e => e.IdCategorie).HasColumnType("int(11)");

                entity.Property(e => e.LibelleCategorie)
                    .IsRequired()
                    .HasMaxLength(50);
            });

            modelBuilder.Entity<Produit>(entity =>
            {
                entity.HasKey(e => e.IdProduit)
                    .HasName("PRIMARY");

                entity.ToTable("produits");

                entity.HasIndex(e => e.IdCategorie, "IdCategorie");

                entity.HasIndex(e => e.IdRayon, "IdRayon");

                entity.Property(e => e.IdProduit).HasColumnType("int(11)");

                entity.Property(e => e.IdCategorie).HasColumnType("int(11)");

                entity.Property(e => e.IdRayon).HasColumnType("int(11)");

                entity.Property(e => e.LibelleProduit)
                    .IsRequired()
                    .HasMaxLength(50);

                entity.HasOne(d => d.Categorie)
                    .WithMany(p => p.Produits)
                    .HasForeignKey(d => d.IdCategorie)
                    .OnDelete(DeleteBehavior.ClientSetNull)
                    .HasConstraintName("produits_ibfk_1");

                entity.HasOne(d => d.Rayon)
                    .WithMany(p => p.Produits)
                    .HasForeignKey(d => d.IdRayon)
                    .OnDelete(DeleteBehavior.ClientSetNull)
                    .HasConstraintName("produits_ibfk_2");
            });

            modelBuilder.Entity<Rayon>(entity =>
            {
                entity.HasKey(e => e.IdRayon)
                    .HasName("PRIMARY");

                entity.ToTable("rayons");

                entity.Property(e => e.IdRayon).HasColumnType("int(11)");

                entity.Property(e => e.LibelleRayon)
                    .IsRequired()
                    .HasMaxLength(50);
            });

            OnModelCreatingPartial(modelBuilder);
        }

        partial void OnModelCreatingPartial(ModelBuilder modelBuilder);
    }
}
