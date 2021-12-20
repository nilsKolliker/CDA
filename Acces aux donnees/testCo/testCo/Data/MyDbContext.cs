using System;
using System.IO;
using Microsoft.EntityFrameworkCore;
using Microsoft.EntityFrameworkCore.Metadata;
using Newtonsoft.Json;
using testCo.Data.Models;

#nullable disable

namespace testCo.Data
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

        public virtual DbSet<User> Users { get; set; }

        protected override void OnConfiguring(DbContextOptionsBuilder optionsBuilder)
        {
            if (!optionsBuilder.IsConfigured)
            {
                DataBaseConnexion Parametre= JsonConvert.DeserializeObject<DataBaseConnexion>(File.ReadAllText(".\\Parametre.json"));
                optionsBuilder.UseMySQL("server="+Parametre.Server+";user="+Parametre.User+";database="+Parametre.DataBase+";ssl mode="+Parametre.SslMode+";port="+Parametre.Port+";password="+Parametre.Password);
            }
        }

        protected override void OnModelCreating(ModelBuilder modelBuilder)
        {
            modelBuilder.Entity<User>(entity =>
            {
                entity.ToTable("user");

                entity.Property(e => e.Id)
                    .HasColumnType("int(11)")
                    .HasColumnName("id");

                entity.Property(e => e.Identifiant)
                    .IsRequired()
                    .HasMaxLength(50)
                    .HasColumnName("identifiant");

                entity.Property(e => e.Mdp)
                    .IsRequired()
                    .HasMaxLength(50)
                    .HasColumnName("mdp");

                entity.Property(e => e.Role)
                    .HasColumnType("int(11)")
                    .HasColumnName("role");
            });

            OnModelCreatingPartial(modelBuilder);
        }

        partial void OnModelCreatingPartial(ModelBuilder modelBuilder);
    }
}
