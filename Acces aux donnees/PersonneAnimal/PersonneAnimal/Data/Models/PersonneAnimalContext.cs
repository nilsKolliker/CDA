using System;
using Microsoft.EntityFrameworkCore;
using Microsoft.EntityFrameworkCore.Metadata;

#nullable disable

namespace PersonneAnimal.Data.Models
{
    public partial class PersonneAnimalContext : DbContext
    {
        public PersonneAnimalContext()
        {
        }

        public PersonneAnimalContext(DbContextOptions<PersonneAnimalContext> options)
            : base(options)
        {
        }

        public virtual DbSet<Adoption> Adoptions { get; set; }
        public virtual DbSet<Animal> Animals { get; set; }
        public virtual DbSet<Personne> Personnes { get; set; }
        public virtual DbSet<Sexe> Sexes { get; set; }

        protected override void OnConfiguring(DbContextOptionsBuilder optionsBuilder)
        {
            if (!optionsBuilder.IsConfigured)
            {
                optionsBuilder.UseMySQL("Name=GoDTB");
            }
        }

        protected override void OnModelCreating(ModelBuilder modelBuilder)
        {
            modelBuilder.Entity<Adoption>(entity =>
            {
                entity.HasKey(e => e.IdAdoption)
                    .HasName("PRIMARY");

                entity.ToTable("adoption");

                entity.HasIndex(e => e.IdAnimal, "IdAnimal");

                entity.HasIndex(e => e.IdPersonne, "IdPersonne");

                entity.Property(e => e.IdAdoption).HasColumnType("int(11)");

                entity.Property(e => e.IdAnimal).HasColumnType("int(11)");

                entity.Property(e => e.IdPersonne).HasColumnType("int(11)");

                entity.HasOne(d => d.IdAnimalNavigation)
                    .WithMany(p => p.Adoptions)
                    .HasForeignKey(d => d.IdAnimal)
                    .HasConstraintName("adoption_ibfk_2");

                entity.HasOne(d => d.IdPersonneNavigation)
                    .WithMany(p => p.Adoptions)
                    .HasForeignKey(d => d.IdPersonne)
                    .HasConstraintName("adoption_ibfk_1");
            });

            modelBuilder.Entity<Animal>(entity =>
            {
                entity.HasKey(e => e.IdAnimal)
                    .HasName("PRIMARY");

                entity.ToTable("animal");

                entity.Property(e => e.IdAnimal).HasColumnType("int(11)");

                entity.Property(e => e.Libelle)
                    .IsRequired()
                    .HasMaxLength(50);
            });

            modelBuilder.Entity<Personne>(entity =>
            {
                entity.HasKey(e => e.IdPersonne)
                    .HasName("PRIMARY");

                entity.ToTable("personne");

                entity.HasIndex(e => e.IdSexe, "IdSexe");

                entity.Property(e => e.IdPersonne).HasColumnType("int(11)");

                entity.Property(e => e.IdSexe).HasColumnType("int(11)");

                entity.Property(e => e.Nom)
                    .IsRequired()
                    .HasMaxLength(50);

                entity.HasOne(d => d.IdSexeNavigation)
                    .WithMany(p => p.Personnes)
                    .HasForeignKey(d => d.IdSexe)
                    .OnDelete(DeleteBehavior.ClientSetNull)
                    .HasConstraintName("personne_ibfk_1");
            });

            modelBuilder.Entity<Sexe>(entity =>
            {
                entity.HasKey(e => e.IdSexe)
                    .HasName("PRIMARY");

                entity.ToTable("sexe");

                entity.Property(e => e.IdSexe).HasColumnType("int(11)");

                entity.Property(e => e.Libelle)
                    .IsRequired()
                    .HasMaxLength(1);
            });

            OnModelCreatingPartial(modelBuilder);
        }

        partial void OnModelCreatingPartial(ModelBuilder modelBuilder);
    }
}
